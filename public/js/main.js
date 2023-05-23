import ApiCalls from './apiCalls.js';


$(document).ready(function() {

  var updateViewWithMatchHistory = async function() {
    const teamData = await ApiCalls.getMatchHistory(6,5);
};

$("#getAllTeamsButtonTest").on("click", updateViewWithMatchHistory);


});
