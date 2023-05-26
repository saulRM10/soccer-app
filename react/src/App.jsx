import { useEffect, useState } from 'react';
import axios from 'axios';

function App() {
  // const tableData = [
  //   { place: 1, teamName: 'Barcelona FC', points: 20, gamesPlayed: 10, ga: 8, gf: 15, w: 6, l: 2, d: 2 },
  //   { place: 2, teamName: 'Real Madrid', points: 18, gamesPlayed: 10, ga: 10, gf: 12, w: 5, l: 3, d: 2 },
  // ];
  const [tableData, setTableData] = useState([]);

  useEffect(() => {
    const fetchData = async () => {
      try {
        const response = await axios.get('/allTeams');
        setTableData(response.data);
      } catch (error) {
        console.log(error);
      }
    };

    fetchData();
  }, []);

  return (
    <div>
    <h1>Table Example</h1>
    <table>
      <thead>
        <tr>
          <th>Place</th>
          <th>Team Name</th>
          <th>Points</th>
          <th>Games Played</th>
          <th>GA</th>
          <th>GF</th>
          <th>W</th>
          <th>L</th>
          <th>D</th>
        </tr>
      </thead>
      <tbody>
        {tableData.map((data, index) => (
          <tr key={index}>
            <td>{data.place}</td>
            <td>{data.teamName}</td>
            <td>{data.points}</td>
            <td>{data.gamesPlayed}</td>
            <td>{data.ga}</td>
            <td>{data.gf}</td>
            <td>{data.w}</td>
            <td>{data.l}</td>
            <td>{data.d}</td>
          </tr>
        ))}
      </tbody>
    </table>
  </div>
  )
}

export default App
