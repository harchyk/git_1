function isMobile() {
    return window.screen.availWidth < 760;
}

function listener(event) {
    const iframe = document.getElementById("ckassa-payframe");
    if (event.origin === "https://payframe.ckassa.ru" && event.data === "close" && iframe) {
        iframe.style.display = 'none';
    }
}

let css = document.createElement("link");
css.setAttribute('href', '../wp-content/themes/bagovanie/checkout.css');
css.setAttribute('rel', 'stylesheet');
css.setAttribute('type', 'text/css');
document.head.appendChild(css);

let script = document.getElementsByClassName('checkout-script')[0];

if (script) {
    const urlParams = new URLSearchParams(window.location.search);
    let paramObj = {};
    for(var value of urlParams.keys()) {
        paramObj[value] = urlParams.get(value);
    }
    let service = script.getAttribute('data-service');
    if (service) {
        const reqs = script.getAttribute('data-reqs');
        const lightVersion = script.getAttribute('data-light-version');
        let url = "https://payframe.ckassa.ru/?service=" + service;
        if (reqs) {
            url += "&" + reqs;
        }
        if (lightVersion) {
            url += "&lite-version=1";
        }

        if (isMobile()) {
            //Рисуем кнопку
            let btn = document.createElement("a");
            btn.setAttribute("class", "checkout-btn checkout-link transition1");
            btn.innerHTML = 'Пополнить';
            btn.href = url;
            script.parentNode.insertBefore(btn, script.nextSibling);
        } else {
            //Рисуем кнопку
            let btn = document.createElement("button");
            btn.setAttribute("class", "checkout-btn transition1");
            btn.innerHTML = 'Пополнить';
            script.parentNode.insertBefore(btn, script.nextSibling);
            let iframe = document.createElement("iframe");
            iframe.setAttribute('name', service);
            iframe.setAttribute('id', "ckassa-payframe");
            iframe.setAttribute('src', url);
            iframe.setAttribute('allowtransparency', 'true');
            iframe.setAttribute('allowpaymentrequest', 'true');
            iframe.style.cssText = "display: none; overflow: hidden auto; visibility: visible; border: 0 none transparent; " +
                "margin: 0; padding: 0; position: fixed; left: 0; top: 0; width: 100%; height: 100%; z-index: 2147483647;";
                var insideExistDiv = document.getElementById("bener_pay");
                insideExistDiv.appendChild(iframe);
            

            btn.onclick = function() {
                iframe.style.display = 'block';
            };
            window.addEventListener("message", listener);
        }
    }
}