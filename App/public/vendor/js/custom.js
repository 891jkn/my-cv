
const body = document.getElementById("root");
const main = document.getElementById("root2")
let loadingHtml = `
<div class="spinner-border " id = "loading" style="position:fixed!important;left:50%;top:50%;z-index:100;" role="status">
  <span class="sr-only" style="background-color:#4e54c8;"></span>
</div>
`;
// function 
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
body.innerHTML += bg_html;
//get context
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

typing("Hello : Everyone ! Welcome to my CV website. \` If You Are Fresher or Junior , You Can Get Your CV Template Here.")
function timer(ms) { return new Promise(res => setTimeout(res, ms)); }
function showloginScreen(){
    loginScreen = `
        <div class = "login-container" id="loginContainer">
            
        <div class="night">
            <div class="shooting_star"></div>
            <div class="shooting_star"></div>
            <div class="shooting_star"></div>
            <div class="shooting_star"></div>
            <div class="shooting_star"></div>
            <div class="shooting_star"></div>
            <div class="shooting_star"></div>
            <div class="shooting_star"></div>
            <div class="shooting_star"></div>
            <div class="shooting_star"></div>
            <div class="shooting_star"></div>
            <div class="shooting_star"></div>
            <div class="shooting_star"></div>
            <div class="shooting_star"></div>
            <div class="shooting_star"></div>
            <div class="shooting_star"></div>
            <div class="shooting_star"></div>
            <div class="shooting_star"></div>
            <div class="shooting_star"></div>
            <div class="shooting_star"></div>
        </div>
            <span class= "btn-closed" onclick = "closeLogin()">&times;</span>
            <form action = "#" method="post" id="loginForm" class="login-form">
                <h2 class="sr-only text-center">Login Form</h2>
                <span class = "text-danger" id ="validSummery"></span>
                <div class="illustration"><i class="icon ion-ios-locked-outline"></i></div>
                <div class="form-group"><input class="form-control my-2" type="email" name="email" id = "email" placeholder="Email"></div>
                <div class="form-group"><input class="form-control my-2" type="password" name="password" id = "password" placeholder="Password"></div>
                <div class="form-group"><button class="btn btn-primary btn-block w-100" type="submit">Log In</button>
                </div>
                <a href="." class="forgot mt-2">Forgot your email or password?</a>
                <a href = "." onclick = "SignIn(event)" class = "forgot mt-2">Don't have an account ? Sign In</a>
            </form>
        </div>
    `;
    body.innerHTML+=loginScreen;
    // login API
    var loginForm = document.getElementById("loginForm")
    loginForm.addEventListener("submit",function(e){
       Login(e.target,e)
    })
}

function closeLogin(){
    loginScreen = document.getElementById("loginContainer")
    body.removeChild(loginScreen)
}
// login form
function SignIn(event){
    event.preventDefault();
    var loginContainer = $("#loginContainer")
    var loginForm = $("#loginContainer form")
    loginForm.remove();
    loginContainer.append(loadingHtml);
    var SignInHtml = `
    <form action = "#" method="post" id="signInForm" class="login-form" onsubmit = "SignInNewAccount(this,event)">
        <h2 class="sr-only text-center">Sign Form</h2>
        <span class = "text-danger" id ="validSummerySignIn"></span>
        <div class="illustration"><i class="icon ion-ios-locked-outline"></i></div>
        <div class="form-group"><input class="form-control my-2" type="email" name="email" id = "email" placeholder="Email"></div>
        <div class="form-group"><input class="form-control my-2" type="password" name="password" id = "password" placeholder="Password"></div>\
        <div class="form-group"><input class="form-control my-2" type="password" name="password" id = "re-password" placeholder="Re - Password"></div>
        <div class="form-group"><button class="btn btn-primary btn-block w-100" type="submit">Sign In</button>
        </div>
        <a href="." class="forgot mt-2">Forgot your email or password?</>
        <a href = "#" onclick = "LoginForm(event)" class = "forgot mt-2">Have an account ? Login</a>
    </form>
    `;
    setTimeout(function(){
        loginContainer.append(SignInHtml);
        $("#loading").remove();
    },2000)
}
function LoginForm(event){
    event.preventDefault();
    var loginContainer = $("#loginContainer")
    var loginForm = $("#loginContainer form")
    loginForm.remove();
    loginContainer.append(loadingHtml);
    var SignInHtml = `
    <form action = "#" method="post" id="loginForm" class="login-form" onsubmit = "Login(this,event)">
        <h2 class="sr-only text-center">Login Form</h2>
        <span class = "text-danger" id ="validSummery"></span>
        <div class="illustration"><i class="icon ion-ios-locked-outline"></i></div>
        <div class="form-group"><input class="form-control my-2" type="email" name="email" id = "email" placeholder="Email"></div>
        <div class="form-group"><input class="form-control my-2" type="password" name="password" id = "password" placeholder="Password"></div>
        <div class="form-group"><button class="btn btn-primary btn-block w-100" type="submit">Log In</button>
        </div>
        <a href="." class="forgot mt-2">Forgot your email or password?</a>
        <a href = "." onclick = "SignIn(event)" class = "forgot mt-2">Don't have an account ? Sign In</a>
    </form>
   `;
    setTimeout(function(){
        loginContainer.append(SignInHtml);
        $("#loading").remove();
    },2000)
}

function SignInNewAccount(self,event){
    event.preventDefault();
    if($("#email").val().trim()!=='' && $("#password").val().trim()!=='' && $('#re-password').val().trim()!==''){
        if($("#password").val().trim()===$('#re-password').val().trim()){
            var LoginContainer = $("#loginContainer")
            LoginContainer.append(loadingHtml);
            let apiUrl = `mycv/User/SignIn/${$("#email").val().trim()}/${$("#password").val().trim()}`;
           
            setTimeout(function(){
                fetch(apiUrl,{
                    method:'post',
                    headers:{
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    }
                }).then(function(res){
                    if(res.ok){
                        $("#loading").remove();
                        return res.json()
                    }
                })
                .then(function(data){
                    if(data === true){
                        AddAlert("SignIn Success","success");
                        LoginAPI($("#email").val().trim(),$("#password").val().trim()).then(function(res){

                            if(res==true){
                                ClearScreen();
                                window.location.href = "http://localhost:8080/mycv/Home/GetUser"
                            }
                        })
                    }else{
                        document.getElementById('validSummerySignIn').innerHTML = data;
                    }
                })
                .catch(function(err){
                    console.log(err)
                })
            },2000)
        }else{
            document.getElementById('validSummerySignIn').innerHTML = "Password not match!";
        }
    }else{
        document.getElementById('validSummerySignIn').innerHTML = "Can\'t null any field";
    }
}
function Login(self,event){
    event.preventDefault();
    let emailVal = $("#email").val();
    let passwordVal = $("#password").val();
    var loginContainer = $("#loginContainer")
    if(emailVal.trim()!== "" && passwordVal.trim() !==""){

        loginContainer.append(loadingHtml)

        setTimeout(function(){


            LoginAPI(emailVal,passwordVal).then((data)=>{
                if(data === true){
                    ClearScreen();
                    window.location.href = "http://localhost:8080/mycv/Home/GetUser"
                }
            })

        },2000)
    }else{
        document.getElementById("validSummery").innerHTML="Email or Password can't be null";
    }
}

function ClearScreen(){
    body.remove();
    document.body.style.background = "white";
    document.body.style.overflow = "auto";
    document.body.style.width = "100%";
    document.body.style.height = "auto";
    document.body.style.display = "block";
}
function LoginAPI(email,password){
    var loginApiUrl = `mycv/User/Login/${email}/${password}`;
    return fetch(loginApiUrl,{
        method:'post',
        headers:{
            'Content-Type': 'application/json',
            'Accept': 'application/json'
        }
    }).then(function(res){
        if(res.ok){
            return res.json();
        }
    }).then(function(data){
        if(data){
            AddAlert('Login Success','success')
            $("#loading").remove();
            return true;
        }else{
            document.getElementById("validSummery").innerHTML="Email or Password incorrect";
            $("#loading").remove();
            return false;
        }
    }).catch(function(err){
        document.getElementById("validSummery").innerHTML=err;
        $("#loading").remove();
        return false;
    }) 
}


function AddAlert(title,typeAlert){
    const Toast = Swal.mixin({
        toast: true,
        showConfirmButton: false,
        timer:2000,
        timerProgressBar:true
      })
      Toast.fire({
        icon: typeAlert,
        title: title,
        position:'top'
      })
}

/// home 

// function FetchHome(){
//     main.innerHTML+=loadingHtml;
//     // fetch
//     setTimeout(() => {
//         let homeAPIUrl = `mycv/Home/GetUser`;
//         fetch(homeAPIUrl,{
//             method:"post",
//             headers:{
//                 'Content-Type': 'application/json',
//                 'Accept': 'application/json'
//             }
//         }).then((res)=>{
//             $("#loading").remove()
//             return res.text();
//         }).then((data)=>{
//             setTimeout(function(){

//             },1000)
//         }).catch((err)=>{
//             console.log(err)
//         })
//     }, 2000);
// }
///form res info