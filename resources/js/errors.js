class Errors {
    constructor() {
        this.errors = {};
    }

    get(field) {
        if (this.errors[field]) {
            return this.errors[field][0];
        }
    }

    record(errors) {
        console.log(errors)
        console.log("record");
        this.errors = errors;
    }

    clear(field) {
        console.log(field)
        console.log("clear");
        delete this.errors[field];
    }
}
window.obj = new Errors();