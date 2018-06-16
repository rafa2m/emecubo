'use strict';

window.addEventListener('load', async e => {


    if ('serviceWorker' in navigator) {
        try {
            navigator.serviceWorker.register('sw.js');
            // console.log(`SW registered`);

        } catch (error) {
            console.log(`Fail SW register`);
        }
    }
});

/*********  Apertura y cierre vertical **********/
function openNav() {
    document.getElementById("menuOverlay").style.width = "100%";

}

function closeNav() {
    document.getElementById("menuOverlay").style.width = "0%";
}
/*********  Apertura y cierre vertical **********/
// /* Open */
// function openNav() {
//     document.getElementById("myNav").style.height = "100%";
// }

// /* Close */
// function closeNav() {
//     document.getElementById("myNav").style.height = "0%";
// }