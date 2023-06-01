import ApiCalls from './apiCalls.js';


$(document).ready(function() {

  var updateViewWithMatchHistory = async function() {
    const teams = await ApiCalls.getTeamsByDivisionAndSession(6,5);
};

var handleDeletionOfGame = async function() {
  const gameId = $(this).data('game-id');
  const statusOfGameDeletion = await ApiCalls.deleteGame(gameId); 
}

$("#getAllTeamsButtonTest").on("click", updateViewWithMatchHistory);
$(".deleteGame").on("click", handleDeletionOfGame);


});
