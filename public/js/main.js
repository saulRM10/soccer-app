import ApiCalls from './apiCalls.js';


$(document).ready(function() {

  var updateViewWithMatchHistory = async function() {
    const teams = await ApiCalls.getTeamsByDivisionAndSession(6,5);
};

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

  render('#teamsContainer', html);
}

var render = function(location, content){
  if (content) {
    $(`${location}`).html(content);
  } else {
    throw new Error('no content to render');
  }
}


$("#getAllTeamsButtonTest").on("click", showTeams);
});
