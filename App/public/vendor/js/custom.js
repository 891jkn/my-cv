
const body = document.getElementById("root");
// function 
function CreatePure(width,height,left){
    return `<span class = "pure-box" style="width:${width}px;height:${height}px;position:absolute!important;left:${left}px!important;border-radius:${width * 0.2}px!important"></span>`
}
// var timeToCreate = 5000
// setInterval(() => {
//     if(body.firstChild !== null){body.removeChild(body.firstChild)}
//     var offsetWidth = Math.floor(Math.random() * ((body.offsetWidth/5) - 10 ) + 10);
//     var offsetLeft =  Math.floor(Math.random() * ((body.offsetHeight - 20) - 20) + 20);
//     var new_pure =  CreatePure(offsetWidth,offsetWidth,offsetLeft);
//     body.innerHTML+=new_pure;

// }, timeToCreate);
var bg_html = `  
    <div class="context" id="context">
        <h1>
            <span class="cursor"></span>
        </h1>
    </div>
    <div class="area" >
        <ul class="circles">
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>
    </div >`
var loadingHtml = `
<div class="center">
<div class="wave"></div>
<div class="wave"></div>
<div class="wave"></div>
<div class="wave"></div>
<div class="wave"></div>
<div class="wave"></div>
<div class="wave"></div>
<div class="wave"></div>
<div class="wave"></div>
<div class="wave"></div>
</div>
`;    
body.innerHTML += bg_html;
//getcontext
var context = document.querySelector("#context h1")

async function typing(message){
    if(message){
        let count = message.length;
        var time = Math.floor(count * 0.1) *10;
        for(let i = 0 ; i< count;i++){
            if(message[i] === '\`'){
                await timer(1000)
                context.innerHTML = "";
                continue;
            }
            if(message[i-1] == ":"){
                time+=500;
            }else{
                time  = Math.floor(count * 0.1) *10;
            }
            await timer(time);
            context.innerHTML += message[i];
        }
        //add loading 
        loginBtn = `<button class = "btn btn-login btn-info " onclick = "showloginScreen()">Login</button>`;
        body.innerHTML += loginBtn;
    }
}

// typing("Hello : Everyone ! Welcome to my CV website. \` If You Are Fresher or Junior , You Can Get Your CV Template Here.")
typing("oke");

function timer(ms) { return new Promise(res => setTimeout(res, ms)); }

function showloginScreen(){
    loginScreen = `
        <div class = "login-container" id = "loginContainer">
    
            <span class= "btn-closed" onclick = "closeLogin()">&times;</span>
            <form method="post" id="loginForm" class="login-form">
                <h2 class="sr-only text-center">Login Form</h2>
                <span class = "text-danger" id ="validSummery"></span>
                <div class="illustration"><i class="icon ion-ios-locked-outline"></i></div>
                <div class="form-group"><input class="form-control my-2" type="email" name="email" id = "email" placeholder="Email"></div>
                <div class="form-group"><input class="form-control my-2" type="password" name="password" id = "password" placeholder="Password"></div>
                <div class="form-group"><button class="btn btn-primary btn-block w-100" type="submit">Log In</button>
                </div>
                <a href="." class="forgot mt-2">Forgot your email or password?</>
            </form>
        </div>
    `;
    body.innerHTML+=loginScreen;
    // login API
    var loginForm = document.getElementById("loginForm")
    loginForm.addEventListener("submit",function(e){

        e.preventDefault();
        let emailVal = $("#email").val();
        let passwordVal = $("#password").val();

        if(emailVal.trim()!== "" && passwordVal.trim() !==""){

            // fetch api
            var loginApiUrl = `my-cv/User/Login/${emailVal}/${passwordVal}`;
            console.log(loginApiUrl)
            fetch(loginApiUrl,{
                method:'get',
                headers:{
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                }
            }).then(function(res){
                if(res.ok){
                    console.log(res.text())
                }else{
                    console.log("failed")
                }
            }).catch(function(err){
                console.log(err)
            }) 

        }else{
            document.getElementById("validSummery").innerHTML+="Email or Password can't be null";
        }
    })
}

function closeLogin(){
    loginScreen = document.getElementById("loginContainer")
    body.removeChild(loginScreen)
}

