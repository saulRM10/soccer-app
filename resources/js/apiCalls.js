
const ApiCalls = function () {

    var loadDomListners = function () {
        console.log("loadDomListners executed");
        $("#ajaxBtn").onClick(getAllGames);
    }
    //Route::get('/games', [GameController::class, 'getAll']);
    var getAllGames = function () {
        fetch('/games')
        .then(response => response.json())
        .then(data => console.log(data))
        .catch(error => console.error(error));
    }

    return{
        getAllGames,
        loadDomListners
    }
}; 

module.exports = ApiCalls(); 
