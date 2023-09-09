const TableRankings = function () {
    var findInFinal = function (finalTeamPoints, team_id) {
        return finalTeamPoints.findIndex(obj => obj.team_id === team_id);
    }

    var getTeamPointsAndGoalDifferential = function (teamData, matchData) {

        if (!teamData && !matchData) {
            return "Please enter data";
        }
        if (!teamData) {
            return "Please enter team data";
        }
        if (!matchData) {
            return "Please enter match data";
        }

        var finalTeamPoints = [];

        teamData.forEach(indTeam => {
            let team_id = indTeam.team_id;
            let newTeam = { team_id: team_id, points: 0, gd: 0 };
            finalTeamPoints.push(newTeam);
        })

        matchData.forEach(indMatch => {
            let team_one_goal_count = indMatch.team_one_goal_count;
            let team_two_goal_count = indMatch.team_two_goal_count;

            let team_one_gd = team_one_goal_count - team_two_goal_count;
            let team_two_gd = team_two_goal_count - team_one_goal_count;

            let indexTeam1inFinal = findInFinal(finalTeamPoints, indMatch.team_one_id);
            let indexTeam2inFinal = findInFinal(finalTeamPoints, indMatch.team_two_id);

            finalTeamPoints[indexTeam1inFinal].gd += team_one_gd;
            finalTeamPoints[indexTeam2inFinal].gd += team_two_gd;

            if (indMatch.tie) {
                finalTeamPoints[indexTeam1inFinal].points++;
                finalTeamPoints[indexTeam2inFinal].points++;

            }
            else {
                let indexInFinalArrayWinner = findInFinal(finalTeamPoints, indMatch.winner_id);
                finalTeamPoints[indexInFinalArrayWinner].points += 3;
            }

        })

        return finalTeamPoints;
    }

    var sortTeamsByPoints = function (teamData) {
        teamData.sort((team_a, team_b) => team_b.points - team_a.points);
        return teamData;
    }

    var getRangeIndexOfTiedPointsTeams = function (teamData) {
        let i = 0;
        let j = 1;
        let arrWithIndexes = [];

        while (j < teamData.length) {
            if (teamData[i].points != teamData[j].points) {
                if (i == j - 1) {
                    i++;
                }
                else {
                    arrWithIndexes.push(i);
                    arrWithIndexes.push(j - 1);
                    i = j;
                }
            }
            else {
                if (j == teamData.length - 1) {
                    arrWithIndexes.push(i);
                    arrWithIndexes.push(j);

                }
                else if (teamData[j].points != teamData[j + 1].points) {
                    arrWithIndexes.push(i);
                    arrWithIndexes.push(j);
                    i = j + 1;
                    j++;
                }
            }
            j++;
        }

        const pairsOfTwo = [];

        for (let i = 0; i < arrWithIndexes.length; i += 2) {
            pairsOfTwo.push([arrWithIndexes[i], arrWithIndexes[i + 1]]);
        }

        return pairsOfTwo;
    }


    return {
        getTeamPointsAndGoalDifferential,
        sortTeamsByPoints,
        getRangeIndexOfTiedPointsTeams
    }
}

TableRankings();
module.exports = TableRankings();