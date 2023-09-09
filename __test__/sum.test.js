const apiCalls = require("../public/js/apiCalls.js");

describe("sum()", function () {
    it("testing add", function () {
        const result = apiCalls.sum(1, 2);
        expect(result).toBe(3);
    })
})