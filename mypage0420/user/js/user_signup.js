let flag_id = false;
let flag_pw = false;
let flag_nicname = false;
let flag_name = false;
let flag_certification = false;

function check_id() {
    let id = document.getElementsByName('id')[0].value;
    let check_id = document.getElementById('check_id');
    let reg = /^[a-z0-9]{5,16}$/;

    
    if(id.match(reg)){
        

        

        

        check_id.style.color = "blue";
        check_id.innerHTML = "사용 가능한아이디입니다!";
        flag_id = true;

        
    }else{
        check_id.style.color = "red";
        check_id.innerHTML = "아이디는 5~16자리 영문 소문자와 숫자만 사용해주세요.";
        flag_id = false;
    }

}

function check_password() {
    let password = document.getElementsByName('pass')[0].value;
    let check_pw = document.getElementById('check_pw');
    let reg = /^(?=.*[a-zA-Z])((?=.*\d)(?=.*\W)).{6,20}$/;
  
    if(password.match(reg)){
        check_pw.style.color = "blue";
        check_pw.innerHTML = "사용 가능한비밀번호입니다!";
        flag_pw = true;
    }else{
        check_pw.style.color = "red";
        check_pw.innerHTML = "비밀번호는 6~20자리 영문, 숫자, 특수문자를 포함해서 사용해주세요.";
        flag_pw = false;
    }

}

function confirm_password() {
    let password = document.getElementsByName('pass')[0].value;
    let confirm_pw = document.getElementsByName('pass_confirm')[0].value;
    let check_confirm_pw = document.getElementById('check_confirm_pw');

    if(password === confirm_pw){
        check_confirm_pw.style.color = "blue";
        check_confirm_pw.innerHTML = "비밀번호가 일치합니다!";
    }else{
        check_confirm_pw.style.color = "red";
        check_confirm_pw.innerHTML = "비밀번호가 일치하지 않습니다.";
    }
}


function check_nicname(){
    let nicname = document.getElementsByName('nicname')[0].value;
    let check_nicname = document.getElementById('check_nicname');
    let reg = /^[가-힣|a-z|A-Z|0-9]{2,10}$/;


    if(nicname.match(reg)){
        check_nicname.style.color = "blue";
        check_nicname.innerHTML = "사용 가능한 닉네임입니다!";
        flag_nicname = true;
        
    }else{
        check_nicname.style.color = "red";
        check_nicname.innerHTML = "닉네임은 2~10 영문 한글 숫자만 사용 가능합니다.";
        flag_nicname = false;
    }
}

function check_name(){
    let name = document.getElementsByName('name')[0].value;
    let check_name = document.getElementById('check_name');
    let reg = /^[가-힣]+$/;
    
    if(!name.match(reg)){
        check_name.style.color = "red";
        check_name.innerHTML = "한글만 입력해주세요.";
        flag_name = false;
    }else{
        check_name.style.color = "bluc";
        check_name.innerHTML = "";
        flag_name = true;
    }
}


function check_input() {
    if (!document.user_form.id.value) {
        alert("아이디를 입력하세요!");
        document.user_form.id.focus();
        return false;
    }else if(!flag_id){
        alert("아이디를 조건에 맞게 입력하세요!");
        document.user_form.id.focus();
        return false;
    }

    if (!document.user_form.pass.value) {
        alert("비밀번호를 입력하세요!");
        document.user_form.pass.focus();
        return false;
    }else if(!flag_pw){
        alert("비밀번호를 조건에 맞게 입력하세요!");
        document.user_form.pass.focus();
        return false;
    }

    if (!document.user_form.pass_confirm.value) {
        alert("비밀번호확인을 입력하세요!");
        document.user_form.pass_confirm.focus();
        return false;
    }

    if (!document.user_form.nicname.value) {
        alert("닉네임을 입력하세요!");
        document.user_form.nicname.focus();
        return false;
    }else if(!flag_nicname){
        alert("닉네임을 조건에 맞게 입력하세요!");
        document.user_form.nicname.focus();
        return false;
    }

    if (!document.user_form.name.value) {
        alert("이름을 입력하세요!");
        document.user_form.name.focus();
        return false;
    }else if(!flag_name){
        alert("이름을 조건에 맞게 입력하세요!");
        document.user_form.name.focus();
        return false;
    }

    if (!document.user_form.year.value) {
        alert("년도를 선택하세요!");
        document.user_form.year.focus();
        return false;
    }

    if (!document.user_form.month.value) {
        alert("월을 선택하세요!");
        document.user_form.month.focus();
        return false;
    }

    if (!document.user_form.day.value) {
        alert("일을 선택하세요!");
        document.user_form.day.focus();
        return false;
    }

    if (!document.user_form.gender.value) {
        alert("성별을 선택하세요!");
        document.user_form.gender.focus();
        return false;
    }

    if (!document.user_form.email.value) {
        alert("이메일 주소를 입력하세요!");
        document.user_form.email.focus();
        return false;
    }

    if (!document.user_form.phone.value) {
        alert("핸드폰번호를 입력하세요!");
        document.user_form.phone.focus();
        return false;
    }

    if (!document.user_form.certification.value) {
        alert("인증번호를 입력하세요!");
        document.user_form.certification.focus();
        return false;
    }

    if (document.user_form.pass.value !=
        document.user_form.pass_confirm.value) {
        alert("비밀번호가 일치하지 않습니다.\n다시 입력해 주세요!");
        document.user_form.pass.focus();
        document.user_form.pass.select();
        return false;
    }

    return true;
}