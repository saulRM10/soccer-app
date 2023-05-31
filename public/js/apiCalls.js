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

    var getMatchHistory = function ( ) {
        return fetch('/gamesTest')
        .then(response => {
          if (!response.ok) {
            throw new Error('Error: ' + response.status);
          }
          return response.json();
        })
        .catch(error => console.error(error))
    }
    
    var getTeamsByDivisionAndSession = function (sessionId, divisionId) {
        return fetch('/table', {
            headers: {
              'session-Id': sessionId,
              'division-Id': divisionId
            }
        }
        ).then(response => {
          if (!response.ok) {
            throw new Error('Error: ' + response.status);
          }
          return response.json();
        })
        .catch(error => console.error(error))
    }

    var deleteGame = function(gameId) {
        return fetch('/deleteGame', {
            method: 'POST',
            headers: {
                'game-Id': gameId,
            },
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Error: ' + response.status);
            }
            return response.json();
        })
        .catch(error => console.error(error));
    };

    return {
      getAllTeams,
      getMatchHistory,
      getTeamsByDivisionAndSession
    };
  };
  
  export default ApiCalls();