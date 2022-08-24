var checks = document.getElementsByClassName("checks")
var checkAllButton = document.getElementById("checkAllButton")

checkAllButton.addEventListener("click", (e) => {
    e.preventDefault()
    checkAll(checks)
})

clearAllButton.addEventListener("click", (e) =>{
    e.preventDefault()
    clearAll(checks)
})


function checkAll() {
    for(i=0; i<checks.length; i++) {
        checks[i].checked = true
    }
}

function clearAll() {
    for(i=0; i<checks.length; i++) {
        checks[i].checked = false
    }
}
