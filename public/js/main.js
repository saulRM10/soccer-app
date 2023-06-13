import ApiCalls from './apiCalls.js';


$(document).ready(function() {

  var updateViewWithMatchHistory = async function() {
    const teams = await ApiCalls.getTeamsByDivisionAndSession(6,5);
};

var handleDeletionOfGame = async function() {
  const gameId = $(this).data('game-id');
  var csrfToken = $(this).data('token');
  
  await ApiCalls.deleteGame(gameId,6,5, csrfToken); 
}

var showTeams = async function(){
  const teams = await ApiCalls.getTeamsByDivisionAndSession(6,5); 

  teams.sort((a, b) => {
    const nameA = a.team_name.toUpperCase();
    const nameB = b.team_name.toUpperCase();
  
    if (nameA < nameB) {
      return -1;
    }
  
    if (nameA > nameB) {
      return 1;
    }
  
    return 0;
  });

  const route = 'teamsList';
  
  const html = await ApiCalls.renderView(teams, route);
  $('#teamsContainer').html(html);
}


$("#getAllTeamsButtonTest").on("click", showTeams);
$(".deleteGame").on("click", handleDeletionOfGame);


});
