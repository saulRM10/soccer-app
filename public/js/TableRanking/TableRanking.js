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

    var getRangeIndexOfTiedPointsTeams = function (sortedByPointsTeam) {
        let i = 0;
        let j = 1;
        let arrWithIndexes = [];

        while (j < sortedByPointsTeam.length) {
            if (sortedByPointsTeam[i].points != sortedByPointsTeam[j].points) {
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
                if (j == sortedByPointsTeam.length - 1) {
                    arrWithIndexes.push(i);
                    arrWithIndexes.push(j);

                }
                else if (sortedByPointsTeam[j].points != sortedByPointsTeam[j + 1].points) {
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

    var sortTeamsByGoalDifferential = function (teamData, arrWithIndexes) {
        if (arrWithIndexes.length == 0) {
            return teamData;
        }

        arrWithIndexes.forEach(pairIndex => {
            let startIndex = pairIndex[0];
            let endIndex = pairIndex[1];

            let subTeamData = teamData.slice(startIndex, endIndex + 1);
            subTeamData.sort((team1, team2) => team2.gd - team1.gd);

            teamData.splice(startIndex, endIndex - startIndex + 1);
            teamData.splice(startIndex, 0, subTeamData);
            teamData = teamData.flat(1);
        })

        return teamData;
    }

    var getRangeIndexOfTiedGdTeams = function (sortedByPointsAndGDTeam) {
        let i = 0;
        let j = 1;
        let arrWithIndexes = [];

        while (j < sortedByPointsAndGDTeam.length) {
            let isSamePoints = sortedByPointsAndGDTeam[i].points == sortedByPointsAndGDTeam[j].points;
            let isSameGD = sortedByPointsAndGDTeam[i].gd == sortedByPointsAndGDTeam[j].gd;

            if (isSamePoints && isSameGD) {
                let isEndOfEqualPoints = sortedByPointsAndGDTeam[j].points != sortedByPointsAndGDTeam[j + 1]?.points;
                let isEndOfEqualGD = sortedByPointsAndGDTeam[j].gd != sortedByPointsAndGDTeam[j + 1]?.gd;

                if (isEndOfEqualPoints || isEndOfEqualGD) {
                    arrWithIndexes.push([i, j]);
                    i = j + 1;
                    j += 2;
                    continue;
                }
                if (j == sortedByPointsAndGDTeam.length - 1) {
                    console.log("last", i, j);
                    arrWithIndexes.push([i, j]);
                }
            }
            else {
                i++;
            }
            j++;
        }

        return arrWithIndexes;
    }

    var getRelevantTeam = function (teamData, tiedPointsAndGdTeamsIndexRange) {
        let calculateWinnerIds = {};
        let begin = tiedPointsAndGdTeamsIndexRange[0];
        let end = tiedPointsAndGdTeamsIndexRange[1];

        for (let i = begin; i <= end; i++) {
            var getTeamId = teamData[i].team_id;
            calculateWinnerIds[getTeamId] = 0;
        }

        return calculateWinnerIds;
    }


    return {
        getTeamPointsAndGoalDifferential,
        sortTeamsByPoints,
        getRangeIndexOfTiedPointsTeams,
        sortTeamsByGoalDifferential,
        getRangeIndexOfTiedGdTeams,
        getRelevantTeam
    }
}

TableRankings();
module.exports = TableRankings();