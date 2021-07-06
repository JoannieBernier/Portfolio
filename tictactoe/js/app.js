new Vue({
    el: '#app',
    data: {
        debut: true,
        ouvert: true,
        boxes: [ null, null, null, null, null, null, null, null, null ],
        tour: "X",
        fin: false,
        isActive: true,
    },
    methods: {
        boxCliquee: function(index) {
            if(this.boxes[index] == null) {

                Vue.set(this.boxes, index, this.boxes[index] = this.tour)

                if(this.boxes[0] == this.tour & this.boxes[1] == this.tour & this.boxes[2] == this.tour) {
                    this.debut = false
                    this.fin = true
                }
                else if(this.boxes[3] == this.tour & this.boxes[4] == this.tour & this.boxes[5] == this.tour) {
                    this.debut = false
                    this.fin = true
                }
                else if(this.boxes[6] == this.tour & this.boxes[7] == this.tour & this.boxes[8] == this.tour) {
                    this.debut = false
                    this.fin = true
                }
                else if(this.boxes[0] == this.tour & this.boxes[3] == this.tour & this.boxes[6] == this.tour) {
                    this.debut = false
                    this.fin = true
                }
                else if(this.boxes[1] == this.tour & this.boxes[4] == this.tour & this.boxes[7] == this.tour) {
                    this.debut = false
                    this.fin = true
                }
                else if(this.boxes[2] == this.tour & this.boxes[5] == this.tour & this.boxes[8] == this.tour) {
                    this.debut = false
                    this.fin = true
                }
                else if(this.boxes[0] == this.tour & this.boxes[4] == this.tour & this.boxes[8] == this.tour) {
                    this.debut = false
                    this.fin = true
                }
                else if(this.boxes[2] == this.tour & this.boxes[4] == this.tour & this.boxes[6] == this.tour) {
                    this.debut = false
                    this.fin = true
                }
                else if(this.tour == "X") {
                    this.tour = "O"
                } else {
                    this.tour = "X"
                }

            }
        },
    },
})