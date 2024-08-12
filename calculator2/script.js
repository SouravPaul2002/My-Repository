// let string = "";
// let num = document.querySelectorAll(".number");
// Array.from(num).forEach((num) => {
//     num.addEventListener('click', (a) => {
//         console.log(a.target);
//         string = string + a.target.innerHTML;
//         document.querySelector("input").value = string;
//     })
// })





let input = document.getElementById('screen');
let buttons = document.querySelectorAll('button');
let string = "";
let arr = Array.from(buttons);
arr.forEach(button => {
    button.addEventListener('click', (e) => {
        if (e.target.innerHTML == '=') {
            if (input.value == "") {
                string = "";
                input.value = string;
            } else {
                string = eval(string);
                input.value = string;
            }
        }
        else if (e.target.innerHTML == 'C') {
            string = "";
            input.value = string;
        }
        else if (e.target.innerHTML == 'D') {
            string = string.substring(0, string.length - 1);
            input.value = string;
        }
        else {
            string += e.target.innerHTML;
            input.value = string;
        }
    })
})