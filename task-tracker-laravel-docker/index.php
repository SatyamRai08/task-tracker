<!DOCTYPE html>
<html>
<head>
<title>Task Tracker</title>

<style>
*{margin:0;padding:0;box-sizing:border-box;font-family:Arial}

body{
    background:#0a0f1c;
    height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    color:#fff;
    overflow:hidden;
}

body::before{
    content:"";
    position:absolute;
    width:200%;
    height:200%;
    background:radial-gradient(circle,#00eaff33 1px, transparent 1px);
    background-size:40px 40px;
    animation:moveBg 20s linear infinite;
}

@keyframes moveBg{
    from{transform:translate(0,0)}
    to{transform:translate(-200px,-200px)}
}

.container{
    position:relative;
    background:rgba(30,30,47,0.9);
    backdrop-filter:blur(20px);
    padding:55px;
    border-radius:25px;
    width:550px;
    box-shadow:0 30px 80px rgba(0,0,0,0.9);
    text-align:center;
    animation:fadeIn 1s ease;
    z-index:1;
}

@keyframes fadeIn{
    from{opacity:0;transform:translateY(40px)}
    to{opacity:1;transform:translateY(0)}
}

h2{
    font-size:30px;
    margin-bottom:25px;
    border-right:3px solid #00eaff;
    width:0;
    overflow:hidden;
    white-space:nowrap;
    animation:typing 3s steps(20,end) forwards, blink 0.7s infinite;
}

@keyframes typing{
    to{width:220px}
}

@keyframes blink{
    50%{border-color:transparent}
}

input{
    width:100%;
    padding:16px;
    border-radius:12px;
    border:none;
    outline:none;
    margin-bottom:20px;
    background:#1f1f35;
    color:#fff;
    transition:0.3s;
}

input:focus{
    box-shadow:0 0 15px #00eaff;
}

.add-btn{
    width:100%;
    padding:16px;
    background:linear-gradient(90deg,#00eaff,#0072ff);
    color:#000;
    font-size:17px;
    font-weight:bold;
    border:none;
    border-radius:12px;
    cursor:pointer;
    transition:0.3s;
}

.add-btn:hover{
    transform:scale(1.08);
    box-shadow:0 0 25px #00eaff;
}

ul{list-style:none;margin-top:20px;}

li{
    background:#1f1f35;
    padding:14px;
    border-radius:12px;
    margin-bottom:12px;
    display:flex;
    justify-content:space-between;
    align-items:center;
    animation:slideIn 0.4s ease;
}

@keyframes slideIn{
    from{opacity:0;transform:translateX(-40px)}
    to{opacity:1;transform:translateX(0)}
}

.del{
    background:linear-gradient(90deg,#ff4d4d,#ff0000);
    color:white;
    padding:6px 12px;
    border-radius:8px;
    border:none;
    cursor:pointer;
    transition:0.3s;
}

.del:hover{
    transform:scale(1.2);
    box-shadow:0 0 12px red;
}
</style>

</head>
<body>

<div class="container">

<h2>Task Tracker</h2>

<input type="text" id="taskInput" placeholder="Enter your task">
<button class="add-btn" onclick="addTask()">➕ Add Task</button>

<ul id="taskList"></ul>

</div>

<script>

let tasks = JSON.parse(localStorage.getItem('tasks')) || [];

function showTasks(){
    let list = document.getElementById("taskList");
    list.innerHTML = "";
    tasks.forEach((t,i)=>{
        list.innerHTML += `
        <li>
            ${t}
            <button class="del" onclick="deleteTask(${i})">🗑</button>
        </li>`;
    });
}

function addTask(){
    let input = document.getElementById("taskInput");
    if(input.value==="") return;
    tasks.push(input.value);
    localStorage.setItem("tasks", JSON.stringify(tasks));
    input.value="";
    showTasks();
}

function deleteTask(i){
    tasks.splice(i,1);
    localStorage.setItem("tasks", JSON.stringify(tasks));
    showTasks();
}

showTasks();

</script>

</body>
</html>