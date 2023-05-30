import ApiCalls from './apiCalls.js';

$(document).ready(function() {

  var updateViewWithTeams = async function() {
    var teamsContainer = document.getElementById('teamsContainer');

    const teamData = await ApiCalls.getAllTeams();

    const response = await fetch('resources/views/dynamicTemplates/teamTemplate.njk');
    const templateContent = await response.text();

    const renderedTemplate = nunjucks.renderString(templateContent, { teamData });

    teamsContainer.innerHTML = renderedTemplate;

};

$("#getAllTeamsButtonTest").on("click", updateViewWithTeams);


});
