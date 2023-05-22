import ApiCalls from './apiCalls.js';
import Handlebars from 'handlebars';
//import Handlebars from 'handlebars/dist/handlebars';

$(document).ready(function() {

  var updateViewWithTeams = async function() {
    const teamData = await ApiCalls.getAllTeams();
    const templateSource = $('#team-template').html();
    const template = Handlebars.compile(templateSource);
    const html = template({ teams: teamData });
    const teamsContainer = document.getElementById('teamsContainer');
    teamsContainer.innerHTML = html;
};

$("#getAllTeamsButtonTest").on("click", updateViewWithTeams);


});
