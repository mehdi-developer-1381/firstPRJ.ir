class click{
    up_down_click(jquery_selector){
        if(!sessionStorage.key("test")){
            this.counter_click();
        }else {
            var check = sessionStorage.getItem("test");

            console.log(check)
            if (check === "session") {
                alert("is session");
                sessionStorage.removeItem("test")
            }
        }
    }

    counter_click(){
        if(sessionStorage.getItem("test") !== "session") {
            sessionStorage.setItem("test", "session");
        }
    }
}
