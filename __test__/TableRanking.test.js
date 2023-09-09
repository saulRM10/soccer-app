const TableRankings = require("../public/js/TableRanking/TableRanking");

describe("getTeamPointsAndGoalDifferential()", function () {
    it("given match data & team data, it returns array with each team's final point & goal differencial", function () {
        const teamData = getTeamsData();
        const matchData = getMatchHistoryData();
        const result = TableRankings.getTeamPointsAndGoalDifferential(teamData, matchData);
        expect(result).toStrictEqual([{ "gd": -2, "points": 1, "team_id": 1 }, { "gd": 2, "points": 7, "team_id": 2 }, { "gd": 0, "points": 4, "team_id": 3 }, { "gd": 0, "points": 4, "team_id": 4 }]);
    })
    it("given match data & no team data, it asks user to enter team data", function () {
        const teamData = undefined;
        const matchData = getMatchHistoryData();
        const result = TableRankings.getTeamPointsAndGoalDifferential(teamData, matchData);
        expect(result).toBe("Please enter team data");
    })
    it("given team data & no match data, it asks user to enter match data", function () {
        const teamData = getTeamsData();
        const matchData = undefined;
        const result = TableRankings.getTeamPointsAndGoalDifferential(teamData, matchData);
        expect(result).toBe("Please enter match data");
    })
    it("given no data, it asks user to enter all data", function () {
        const teamData = undefined;
        const matchData = undefined;
        const result = TableRankings.getTeamPointsAndGoalDifferential(teamData, matchData);
        expect(result).toBe("Please enter data");
    })
})

describe("sortTeamsByPoints()", function () {
    it("given team data, it returns team data sorted by points in descending order", function () {
        const calculatedTeamData = [{ "gd": -2, "points": 1, "team_id": 1 }, { "gd": 2, "points": 7, "team_id": 2 }, { "gd": 0, "points": 4, "team_id": 3 }, { "gd": 0, "points": 4, "team_id": 4 }];
        const result = TableRankings.sortTeamsByPoints(calculatedTeamData);
        expect(result).toStrictEqual([{ "gd": 2, "points": 7, "team_id": 2 }, { "gd": 0, "points": 4, "team_id": 3 }, { "gd": 0, "points": 4, "team_id": 4 }, { "gd": -2, "points": 1, "team_id": 1 }]);
    })
})

describe("getRangeIndexOfTiedPointsTeams()", function () {
    it("given sorted team data with no tied teams, it should return an empty array", function () {
        const calculatedTeamData = [{ "points": 4 }, { "points": 3 }, { "points": 2 }, { "points": 1 }];
        const result = TableRankings.getRangeIndexOfTiedPointsTeams(calculatedTeamData);
        expect(result).toStrictEqual([]);
    })
    it("given sorted team data with 2 tied teams in the middle, it should return an array of length 2", function () {
        const calculatedTeamData = [{ "points": 7 }, { "points": 4 }, { "points": 4 }, { "points": 1 }];
        const result = TableRankings.getRangeIndexOfTiedPointsTeams(calculatedTeamData);
        expect(result).toStrictEqual([[1, 2]]);
    })
    it("given sorted team data with 2 tied teams in the beginning, it should return an array of length 2", function () {
        const calculatedTeamData = [{ "points": 7 }, { "points": 7 }, { "points": 4 }, { "points": 1 }];
        const result = TableRankings.getRangeIndexOfTiedPointsTeams(calculatedTeamData);
        expect(result).toStrictEqual([[0, 1]]);
    })
    it("given sorted team data with 3 tied teams at the end, it should return an array of length 2 including last index", function () {
        const calculatedTeamData = [{ "points": 7 }, { "points": 4 }, { "points": 4 }, { "points": 4 }];
        const result = TableRankings.getRangeIndexOfTiedPointsTeams(calculatedTeamData);
        expect(result).toStrictEqual([[1, 3]]);
    })
    it("given sorted team data with 2 sets of tied teams, it should return every index of that array", function () {
        const calculatedTeamData = [{ "points": 7 }, { "points": 7 }, { "points": 4 }, { "points": 4 }];
        const result = TableRankings.getRangeIndexOfTiedPointsTeams(calculatedTeamData);
        expect(result).toStrictEqual([[0, 1], [2, 3]]);
    })
    it("given sorted team data with 2 sets of tied teams, it should return every index of that array", function () {
        const calculatedTeamData = [{ "points": 5 }, { "points": 5 }, { "points": 4 }, { "points": 4 }, { "points": 4 }, { "points": 4 }, { "points": 3 }, { "points": 2 }];
        const result = TableRankings.getRangeIndexOfTiedPointsTeams(calculatedTeamData);
        expect(result).toStrictEqual([[0, 1], [2, 5]]);
    })
})

var getTeamsData = function () {
    return [
        {
            team_id: 1,
            team_name: "Real Madrid FC",
        },
        {
            team_id: 2,
            team_name: "FC Barcelona",
        },
        {
            team_id: 3,
            team_name: "Chealse FC",
        },
        {
            team_id: 4,
            team_name: "Matchester City FC",
        },
    ]
};

var getMatchHistoryData = function () {
    return [
        {
            match_id: 100,
            team_one_id: 1,
            team_two_id: 2,
            team_one_goal_count: 2,
            team_two_goal_count: 3,
            winner_id: 2,
            losser_id: 1,
            tie: false,
        },
        {
            match_id: 445,
            team_one_id: 3,
            team_two_id: 2,
            team_one_goal_count: 2,
            team_two_goal_count: 3,
            winner_id: 2,
            losser_id: 3,
            tie: false,
        },
        {
            match_id: 325,
            team_one_id: 4,
            team_two_id: 2,
            team_one_goal_count: 2,
            team_two_goal_count: 2,
            winner_id: null,
            losser_id: null,
            tie: true,
        },
        {
            match_id: 605,
            team_one_id: 1,
            team_two_id: 3,
            team_one_goal_count: 1,
            team_two_goal_count: 1,
            winner_id: null,
            losser_id: null,
            tie: true,
        },
        {
            match_id: 195,
            team_one_id: 4,
            team_two_id: 1,
            team_one_goal_count: 2,
            team_two_goal_count: 1,
            winner_id: 4,
            losser_id: 1,
            tie: false,
        },
        {
            match_id: 812,
            team_one_id: 3,
            team_two_id: 4,
            team_one_goal_count: 3,
            team_two_goal_count: 2,
            winner_id: 3,
            losser_id: 4,
            tie: false,
        },

    ]
};
