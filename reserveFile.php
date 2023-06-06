if(allocationDay === currentDay){

if(randomone.innerHTML === input_one.value && randomtwo.innerHTML === input_two.value && randomthree.innerHTML === input_three.value) {
    message.style = "color: #fff";
    message.innerHTML = "YOU WIN THE GRAND PRIZE !"; 
    btn.disabled = false;
    // Swal.fire({
    // title: '<h4 style="font-size: 3rem;"><span style="color:blue;">Result:</span> <br><span style = "font-size: 6rem; color: green; font-wieght:700">'+ randomone.innerHTML +''+ randomtwo.innerHTML +''+ randomthree.innerHTML +'</span> <br> YOU WIN THE GRAND PRIZE!</h4>',
    // width: 450,
    // allowOutsideClick: false,
    // padding: '8em',
    // color: 'green',
    // background: '#fff url(images/winner-win.gif) center no-repeat',
    // backdrop: `
    //     rgba(0,0,0,0.6)
    //     url("images/congrats.gif")
    //     cover
    //     no-repeat`
    // }).then((result) => {
    //     input_one.value = "";
    //     input_two.value = "";
    //     input_three.value = "";
    //     input_one.autofocus()
    // });
}
}

else if(randomone.innerHTML === input_one.value && randomtwo.innerHTML === input_two.value) {
message.style = "color: #fff";
message.innerHTML = "YOU WIN THE 2nd PRIZE !"; 
btn.disabled = false;
// Swal.fire({
// title: '<h4 style="font-size: 3rem;"><span style="color:blue;">Result:</span> <br><span style = "font-size: 6rem; color: green; font-wieght:700">'+ randomone.innerHTML +''+ randomtwo.innerHTML +''+ randomthree.innerHTML +'</span> <br> YOU WIN THE 1st PRIZE!</h4>',
// width: 450,
// allowOutsideClick: false,
// padding: '8em',
// color: 'green',
// background: '#fff url(images/winner-win.gif) center no-repeat',
// backdrop: `
//     rgba(0,0,0,0.6)
//     url("images/congrats.gif")
    
//     cover
//     no-repeat`
// }).then((result) => {
//     input_one.value = "";
//     input_two.value = "";
//     input_three.value = "";
//     input_one.autofocus()
// });
}
else if(randomone.innerHTML === input_one.value && randomthree.innerHTML === input_three.value) {
message.style = "color: #fff";
message.innerHTML = "YOU WIN THE 2nd PRIZE !"; 
btn.disabled = false;
// Swal.fire({
// title: '<h4 style="font-size: 3rem;"><span style="color:blue;">Result:</span> <br><span style = "font-size: 6rem; color: green; font-wieght:700">'+ randomone.innerHTML +''+ randomtwo.innerHTML +''+ randomthree.innerHTML +'</span> <br> YOU WIN THE 1st PRIZE!</h4>',
// width: 450,
// allowOutsideClick: false,
// padding: '8em',
// color: 'green',
// background: '#fff url(images/winner-win.gif) center no-repeat',
// backdrop: `
//     rgba(0,0,0,0.6)
//     url("images/congrats.gif")
    
//     cover
//     no-repeat`
// }).then((result) => {
//     input_one.value = "";
//     input_two.value = "";
//     input_three.value = "";
//     input_one.autofocus()
// });
}
else if(randomtwo.innerHTML === input_two.value && randomthree.innerHTML === input_three.value) {
message.style = "color: #fff";
message.innerHTML = "YOU WIN THE 2nd PRIZE !"; 
btn.disabled = false;
// Swal.fire({
// title: '<h4 style="font-size: 3rem;"><span style="color:blue;">Result:</span> <br><span style = "font-size: 6rem; color: green; font-wieght:700">'+ randomone.innerHTML +''+ randomtwo.innerHTML +''+ randomthree.innerHTML +'</span> <br> YOU WIN THE 1st PRIZE!</h4>',
// width: 450,
// allowOutsideClick: false,
// padding: '8em',
// color: 'green',
// background: '#fff url(images/winner-win.gif) center no-repeat',
// backdrop: `
//     rgba(0,0,0,0.6)
//     url("images/congrats.gif")
    
//     cover
//     no-repeat`
// }).then((result) => {
//     input_one.value = "";
//     input_two.value = "";
//     input_three.value = "";
//     input_one.autofocus()
// });
}
else if(randomone.innerHTML === input_one.value || randomtwo.innerHTML === input_two.value || randomthree.innerHTML === input_three.value) {
message.style = "color: #fff";
message.innerHTML = "YOU WIN THE 3rd PRIZE !";
btn.disabled = false;
// Swal.fire({
// title: '<h4 style="font-size: 3rem;"><span style="color:blue;">Result:</span> <br><span style = "font-size: 6rem; color: green; font-wieght:700">'+ randomone.innerHTML +''+ randomtwo.innerHTML +''+ randomthree.innerHTML +'</span> <br> YOU WIN THE 2nd PRIZE!</h4>',
// width: 450,
// allowOutsideClick: false,
// padding: '8em',
// color: 'green',
// background: '#fff url(images/winner-win.gif) center no-repeat',
// backdrop: `
//     rgba(0,0,0,0.6)
//     url("images/congrats.gif")
    
//     cover
//     no-repeat`
// }).then((result) => {
//     input_one.value = "";
//     input_two.value = "";
//     input_three.value = "";
//     input_one.autofocus()
// });
 
}



else {

message.innerHTML = "THANK YOU ! BETTER LUCK NEXT TIME !";
message.style = "color: #fff; font-size: 2.5rem; font-wieght:500;";  
btn.disabled = false;
}   