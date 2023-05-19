const ApiCalls = function () {
    var loadDomListeners = function () {
      $("#getAllTeamsButtonTest").on("click", getAllTeams);

    };
  
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
      loadDomListeners,
      getAllTeams,
    };
  };
  
  export default ApiCalls();