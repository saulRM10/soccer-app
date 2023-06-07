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
  
    var deleteGame = function(gameId, sessionId, divisionId, csrfToken) {
        return fetch('/deleteGame', {
            method: 'POST',
            headers: {
                'game-Id': gameId,
                'session-Id': sessionId,
                'division-Id': divisionId,
                'token': csrfToken
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

    var deleteTeam = function(teamId) {
        return fetch('/deleteTeam', {
            method: 'POST',
            headers: {
                'team-Id': teamId,
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

    var renderView = function (updatedData, viewRoute){
      return fetch(`/${viewRoute}`, {
        headers: {
          'data': JSON.stringify(updatedData),
        }
    }
    ).then(response => {
      if (!response.ok) {
        throw new Error('Error: ' + response.status);
      }
      return response.text();
    })
    .catch(error => console.error(error))
    }

    return {
      getAllTeams,
      getMatchHistory,
      getTeamsByDivisionAndSession,
      deleteGame, 
      deleteTeam,
      renderView
    };
  };
  
  export default ApiCalls();