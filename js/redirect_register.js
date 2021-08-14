function sleep(ms) {
    return new Promise(resolve => setTimeout(resolve, ms));
  }
async function redirect(){
    await sleep(10000);
    window.location.replace("register.html");
}
redirect();