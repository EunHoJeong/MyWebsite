function login_check() {
    let id = document.getElementsByName('login_id')[0].value;
    let pw = document.getElementsByName('login_password')[0].value;

    let id_size = id.length;
    let pw_size = pw.length;
    
    
    if(id_size < 5 || id_size > 16){
        alert("아이디를 확인해주세요.");
        document.login_form.login_id.focus();
        return false;
    }

    if(pw_size < 6 || pw_size > 20){
        alert("비밀번호를 확인해주세요.");
        document.login_form.login_password.focus();
        return false;
    }

    return true;
}

function find_id_check() {
    console.log(document.find_id_form.find_id_name);
    if (!document.find_id_form.find_id_name.value) {
        alert("이름을 입력하세요!");
        document.find_id_form.find_id_name.focus();
        return false;
    }

    if (!document.find_id_form.find_id_phone.value) {
        alert("핸드폰번호를 입력하세요!");
        document.find_id_form.find_id_phone.focus();
        return false;
    }

    return true;
}

function find_pw_check() {
    if (!document.find_pw_form.find_pw_id.value) {
        alert("아이디를 입력하세요!");
        document.find_pw_form.find_pw_id.focus();
        return false;
    }

    if (!document.find_pw_form.find_pw_name.value) {
        alert("이름을 입력하세요!");
        document.find_pw_form.find_pw_name.focus();
        return false;
    }

    if (!document.find_pw_form.find_pw_phone.value) {
        alert("이름을 입력하세요!");
        document.find_pw_form.find_pw_phone.focus();
        return false;
    }

    return true;
}