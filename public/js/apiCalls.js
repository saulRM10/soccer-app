
const ApiCalls = function () {

    var loadDomListners = function () {
        console.log("loadDomListners executed in public");
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

export default ApiCalls;
//module.exports = ApiCalls(); 
