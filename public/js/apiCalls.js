const ApiCalls = function () {
  
    var getAllTeams = function () {
        return fetch('/teams')
        .then(response => {
          if (!response.ok) {
            throw new Error('Error: ' + response.status);
          }
          return response.json();
        })
        .catch(error => console.error(error))
    };
  
    return {
      getAllTeams,
    };
  };
  
  export default ApiCalls();