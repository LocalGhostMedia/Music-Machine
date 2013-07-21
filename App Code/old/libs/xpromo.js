(function(){

    function setInnerHTML( element, html, count ) {
        element.innerHTML = html;
            if( ! count )
                count = 3;
            if( html != '' && element.innerHTML == '' && count < 5 ) {
                ++count;
            setTimeout( function() {
                console.log("innerHTML failed");
                setInnerHTML( element, html, count );
            }, 50 );
        }
    } 

    

    var jsonPHandlers = [], _jsonPID = 1,jsonPRetries=[];

    var closeBig = 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACwAAAAsCAYAAAAehFoBAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAAK6wAACusBgosNWgAAABx0RVh0U29mdHdhcmUAQWRvYmUgRmlyZXdvcmtzIENTNXG14zYAAAAWdEVYdENyZWF0aW9uIFRpbWUAMDQvMDQvMTKS5QRJAAAD10lEQVRYhd2ZvW7iShSAv0W3tBVa0rCV20TmAeIXsJRb0qWCMkh+AMQDIPmWpLoVlLvSvIDzAEab1lXSQJvVuM8t7CET4zG2QVyxn0TBj8efD2fGZ46/fXx8cAS3gJe/vgM3ht+9AK9AlL9+tT3htxbCXeABmAB9/YvNZsN2u/3y416vx/X1dXGMNyAE/gXem5y8iXA3l5wAVwBxHBNFEXEckyRJ5cGO4zAYDPA8j8FgoD7+nYuHdcXrCt/ng/allKxWK4QQe9GsS6/Xw/d9hsMhtm1DFvEJ8PMUwiHwCCCEYD6fk6ZpK9EilmURBAG+76uP/iETN1Il3CW74jspJUEQsF6vTyJaxHVd5vO5ivYz2T9amiIm4S7ZbL5JkoTRaHSyqJqwLIunpyccx4FsVfEoke4Yjv8J3MRxfBZZgDRNGY1GxHEM2fJYms9lwiFwlyQJQRCcRVaRpilBEKgV5y53+UJR+B54lFIaI2vbNsvlUp8ojfF9n+VyqXJ2T3o0GiGlhGyy35uEu+RXZIqsbdssFgscx2E6nbaS9n2f6XSK4zgsFgujdBAE6m2Yu+0JT4C+EKJ0NdBlFU2llayiSnq9XiOEgOxuulvq1CrRBV6llFe+7+9Ft0xWZzabqcFry+okScJ4PFZpsMOyLIQQ2Lb9m6xWeVcRfgCuVqtVaSpUycLhSFfJwmeki6Rpymq1gqwUeIDPlJgAxijlB1Vikj4ke+gcmtMEMuFboB/HsbE2EEIwm80aS9eVrUqp7Xar1uY+cPsX2R2FKIoqB1UDHhLQvz9WVhFFkarwvJ1wfhWVtJGuoo5swc3rkM2+g/Wsom56HKKuLHxx+94BbjabTaOTHSvdRFaRO950gFaFeFvpNrLw6Wiq1mrRVLqtrM5Rwv8HRwnXXWcVbQsmnQ5km8KmNJVVtJVWjh3gpaRvUElbWUUb6dzxpUPWkaksbnSOlVU0kdbcXjtkm029uWGkSW3QpvYwoblFO2HP8yoPalrItC2YytDcog5ZY+5tMBgYJ1/bqusU0r1eT0X4DfillrVQiZUxHA4byzaVNp1DcwrhgrdI70Bo27a+W90hpWQ8HpdWdHVvt6ZIm2Qh273nG9Rdd1O/04XAm+/7uK5bS7ppbVCUrpJ1XVelg+olA/u9tXvgh5SSstSAz/RQLdc2qFarSVZLBYC/0dpWZc3AEHg8VxOwSKEpuNd+NXUvI+AujuOz9tcsy2I+n6tl7Jl8+6bzx7Rb3/MDnh3HQQhROhFPheu6CCGUrIpso4a2zsU8MtC5qIcyiot67FUUf+ACHiyWcfZHt/8BBiybHVRWHaIAAAAASUVORK5CYII=';
    var closeSmall = 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAAK6wAACusBgosNWgAAABx0RVh0U29mdHdhcmUAQWRvYmUgRmlyZXdvcmtzIENTNXG14zYAAAAWdEVYdENyZWF0aW9uIFRpbWUAMDQvMDQvMTKS5QRJAAACGUlEQVRIib2WMY6jQBBF36IN4QAmceYLcAEOABIpTtYRqVdwAOAAtmZTIm9CbAkOwDmI7MD2AZq8NzDdGmNgdiTPfAkJq9rvd1FVNEgpmbkCKeVBSnmSzzr1sWCO8UNKyYhc4AAshRA0TcPtdntYsFgscF0Xy7IAzsAGaIagMYM3YHu9XimKgrquxzag5XkeURRh2zbAH+D3nMEB+FWWJfv9fhY8VBzHrNdrgL/cs3kyeAO2WZbpXVuWhRBiFvx+jed5ZFn2kInRr3OBbVmWGr5araiqCt/3J+G+71NVFavVCoC6rinLEmDbM1HVPl0uF+k4jnQcR4ZhKIUQul2yLNMxdWVZpuNCCBmGoY5dLhfVZRhAACyLotApF0WBaZp6p2maPmTi+z5pmurfpmlSFIXqKHrWEggMIBBC6EcjhGC32z09DmUyhCvtdjtdi7qu1X3wE3CbpnlYXFWVhg5NxpTnuf6PUtM0+L7vGsByOETKJM/zUeBHcEAN5tJ4inzCZAr+XrMGr9CswVRBlYbdNWVwXiwWn4Z/ZNIzzwbQuK77X/A8z0drMmbSMxsDOFqWhed5wH3QkiQZhVdVNVn4JEn0oHmep+6PBnAEzlEUAfdBi6KIruue4EpDk67riKJID1rPOisDgI1t28RxDEDbttpkqhWViYK3bQvcX9v92bCBb3hdf+uB85DJVx2ZSi4vOvTnPlle8tnyD6GrA49b3MsxAAAAAElFTkSuQmCC';
    var sp="http://xpromo.appmobi.com/services.aspx?";
    var params=[];
    params['cmd']="getpromo",params['count']=1,params['companyonly']=0,params['fmt']="jsonp";
    var deviceId,appName,os;
    var singleAdRotationTime=1000*60*4;
    var isNative=false;
    document.addEventListener("appMobi.device.ready",function(){
        
        params['deviceid']=AppMobi.device.uuid;
        params['appname']=AppMobi.app;
        params['os']=AppMobi.device.platform||"IOS";
        isNative=(AppMobi.isnative||AppMobi.isxdk)||false;
    });

    if('AppMobi' in window&&AppMobi.isnative){
        console.log=function(){
            var str="";
            for(i=0;i<arguments.length;i++)
            {
                str+=arguments[i].toString()+" || ";

            }
            AppMobi.debug.log(str);
        }
    }


    jsonP = function(url,cb,error) {
        if(!jsonPRetries[url])
            jsonPRetries[url]=0;
        var callbackName = 'jsonp_callback_promo' + (++_jsonPID);
        var abortTimeout = "";
        var script = document.createElement("script");
        var abort = function() {
            script.parentNode.removeChild(script);
            if (window[callbackName])
                window[callbackName] = null;
            jsonPRetries[url]++;
            if(error&&jsonPRetries[url]<3)
                error();
        };
        window[callbackName] = function(data) {
            clearTimeout(abortTimeout);
            script.parentNode.removeChild(script);
            delete window[callbackName];
            delete jsonPRetries[url];
            cb.call(null, data);
        };
        script.src =url+"&callback="+callbackName;
        script.onerror=function(){
            clearTimeout(abortTimeout);
            console.log("Error fetching promotion");
            jsonPRetries[url]++;
            if(error&&jsonPRetries[url]<3)
                error();
        }
        document.getElementsByTagName("head")[0].appendChild(script);
            abortTimeout = setTimeout(function() {
                abort();
         }, 60000);
        return {};
    };

    function escapeParams(data) {
        var str = "";
        for (j in data) {
            if (str != "")
                str += "&";
            str += j + "=" + encodeURIComponent(data[j]);
        }
        return str;
    }

    function ready(callback){
        if (AppMobi.available)
            callback();
        else
            document.addEventListener("appMobi.device.ready", callback, false);
    }

    function getInterstitial(opts){
        return getXPromo(opts,null,"300x300");
    }
    function noop(){}
    var getXPromo=function(opts,divId,size)
    {
        //Only run after appMobi.device.ready is available
        ready(function(){
            
            if(!isNative)
            return;
            //Allow users to pass in no options and simply a div
            if(typeof(opts)=="string"){
                size=divId,divId=opts,opts={};
            }
            opts=opts||{}
            var tmpParams={};
            for(var j in params)
                tmpParams[j]=params[j];
            tmpParams['size']=size||'320x50';
            tmpParams['companyonly']=opts['companyonly']||0;
            var cb=opts['callback']||noop;
            showSlide=opts['slide']||false;

            if(showSlide&&showSlide!="top")
               showSlide="bottom";


            if( tmpParams['size']!="300x300")
                tmpParams['size']="320x50";
            else
                tmpParams['count']=(window.innerWidth>620&&window.innerHeight>620)?4:(window.innerWidth>600||window.innerHeight>600)?2:1;
            var div;
            
            
            if(tmpParams['size']=="300x300"||showSlide){
                div=document.createElement("div");
                div.id="xpromoaddiv"+_jsonPID;

                if(showSlide){
                    div.style.cssText='position: absolute; top:0px;';
                    div.style.left=((window.innerWidth-320)/2)+"px";
                }
                document.body.appendChild(div);
            }
            else
               div=document.getElementById(divId);



            if( tmpParams['companyonly']!==1)
                 tmpParams['companyonly']=0;

            
            var bannerHeight=50;
            var bannerWidth=320;

            if(window.innerWidth>=600&&tmpParams['size']!=="300x300")
               tmpParams['size']="600x94",bannerHeight=94,bannerWidth=600;

            if(showSlide){
                    div.style.cssText='position: absolute; top:0px;';
                    div.style.left=((window.innerWidth-bannerWidth)/2)+"px";
                }
            var adZindex = (showSlide && tmpParams['size'] !== "300x300") ? 99999 : 999;


            div.style.zIndex = adZindex;
            div.style.visibility="hidden";
            var tmpDivStr="";
            if(tmpParams['size']!=="300x300"){
                if(bannerHeight==94)
                    tmpDivStr='<div style="width:' + bannerWidth + "px;height:" + bannerHeight + "px;margin:auto;position:relative;z-index:" + adZindex + '" ><img alt="" src="data:image/jpeg;base64,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" /></div>';
                else
                tmpDivStr='<div style="width:' + bannerWidth + "px;height:" + bannerHeight + "px;margin:auto;position:relative;z-index:" + adZindex + '" ><img alt="" src="data:image/png;base64,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" /></div>';
            }
            setInnerHTML(div,tmpDivStr);
            div.style.visibility="hidden";
            //return;
            //For scoping reasons, we run an anonymous function
            
            (function(div,showSlide,tmpParams,jsonPID){
                var theUrl=sp+escapeParams(tmpParams);
                
                jsonP(theUrl,function(obj){
                    div.style.visibility="visible";
                    var closeTimeout;
                    if(obj.rtn=="fail")
                        return console.log("Error fetching promo "+obj.rtnmsg);
                    if(tmpParams['size']!=="300x300"){
                        
                        var promo=obj.promos[0];
                        var id=jsonPID;
                        setInnerHTML(div,"");
                        setInnerHTML(div,"<div id='xPromoAd" + id + "' class='topPromoAd' ><div style='width:" + bannerWidth + "px;height:" + bannerHeight + "px;margin:auto;position:relative;z-index:" + adZindex + "' id='xPromoAd" + id + "_close'><a href='javascript:;' onclick=\"AppMobi.advertising.runPromotion ('" + promo.appname + "', '" + promo.storelink + "', '" + promo.id + "', '" + promo.protocol + "', '" + promo['package'] + "', '" + promo.query + "')\"><img src='" + promo.image + "' border=0></a></div></div>");
                        var ad=document.getElementById("xPromoAd"+id);
                        var closeDiv=document.getElementById("xPromoAd"+id+"_close");
                        var close=document.createElement("a");
                            var top="0px";
                            close.style.cssText="position:absolute;top: "+top+";right:0px;";
                            setInnerHTML(close,"<img src='"+closeSmall+"' border=0 style='position:absolute;top:0px;right:0px;z-index:9999'>");
                            close.onclick=function(){
                            div.parentNode.removeChild(div);
                            setTimeout(function(){
                                return getXPromo(opts,divId);
                            },1000*60*2);
                            clearTimeout(closeTimeout);
                        }
                        closeDiv.appendChild(close);

                        if(showSlide=="top")
                        {
                            moveCSS3(div,{y:"-"+bannerHeight,x:"0"},1);
                            setTimeout(function(){
                                    moveCSS3(div,{x:"0",y:"0"},500);
                                    setTimeout(function(){
                                        div.style.webkitTransform="";
                                        div.style.webkitTransitionDuration="";
                                    },510);
                            },1);
                        }
                        else if (showSlide=="bottom") {
                            div.style.bottom="-"+bannerHeight+"px";
                            div.style.top="";
                            setTimeout(function(){
                                var height=window.innerHeight;
                                div.style.bottom="";
                                div.style.top="";
                                moveCSS3(div,{y:height,x:0},1);
                                moveCSS3(div,{y:(height-bannerHeight),x:0},500);
                                setTimeout(function(){
                                        div.style.webkitTransform="";
                                        div.style.webkitTransitionDuration="";
                                        div.style.bottom="0px";
                                        div.style.top="";
                                    },510);

                            },500);

                        }
                        else
                        {
                            div.style.visibility="visible";
                            setTimeout(function(){
                                return getXPromo(opts,divId);
                            },singleAdRotationTime);
                            close.parentNode.removeChild(close);
                        }
                        if(showSlide){
                            closeTimeout=setTimeout(function(){
                                close.onclick();
                            },1000*60*2);
                        }


                    }
                    else {
                        //do popup for multiple 300x300
                        var height=window.innerHeight;
                        var width=window.innerWidth;
                        var allPromos=obj.promos;
                        if(allPromos.length==0)
                           return console.log("No promos found");
                        var promo=allPromos[0];
                        var str="";

                        str="<div style='position:absolute;top:0px;left:0px;height:100%; width:100%;text-align:center;background:rgba(0,0,0,.3);z-index:99999'>";
                        if(width<600)
                            str+="<div style='position:absolute;height:300px;width:300px;left:50%;top:50%;margin:-150px 0 0 -150px;'><a href='javascript:;' onclick=\"AppMobi.advertising.runPromotion ('"+promo.appname+"', '"+promo.storelink+"', '"+promo.id+"', '"+promo.protocol+"', '"+promo['package']+"', '"+promo.query+"')\"><img src='"+promo.image+"' border=0></a></div>";
                        else {

                            var xWidth=0;
                            var xHeight=0;
                            
                            if(width>600&&height>600)
                            {
                                //ipad;
                                switch(allPromos.length)
                                {
                                    case 1:
                                    xWidth=xHeight=300;
                                    break;
                                    case 2:xWidth=616;xHeight=300;
                                    break;
                                    case 3:xWidth=932;xHeight=300;break;
                                    case 4:xWidth=xHeight=616;break;
                                }

                            }
                            else {
                                switch(allPromos.length)
                                {
                                    case 1:
                                    xWidth=xHeight=300;
                                    break;
                                    case 2:xWidth=616;xHeight=300;
                                    break;
                                }

                            }
                            if(height>width)//portrait
                            {
                                var tmp=xHeight;
                                xHeight=xWidth;
                                xWidth=tmp;
                            }
                            str+="<div style='position:absolute;height:"+xHeight+"px;width:"+xWidth+"px;left:50%;top:50%;margin:-"+(xHeight/2)+"px 0 0 -"+(xWidth/2)+"px;text-align:left;'>";
                            for(var i=0;i<allPromos.length;i++)
                            {
                                promo=allPromos[i];
                                var margin="";
                                if(width>height)
                                    margin=(i==0)||(allPromos.length==4&&i==2)?"":"margin-left:16px";
                                else
                                    margin=(i==0)||(allPromos.length==4&&i==2)?"":"margin-top:16px";

                                str+="<a href='javascript:;' onclick=\"AppMobi.advertising.runPromotion ('"+promo.appname+"', '"+promo.storelink+"', '"+promo.id+"', '"+promo.protocol+"', '"+promo['package']+"', '"+promo.query+"')\" style='"+margin+"'><img src='"+promo.image+"' border=0 ></a>";
                                if(allPromos.length==4&&i==1)
                                    str+= "<div style='clear:both;height:16px'></div>";
                            }
                            str+="</div>";

                        }
                        var close=document.createElement("a");
                        var closeImg=width>760||height>760?closeBig:closeSmall;

                        close.style.cssText="position:absolute;top:0px;right:0px;z-index:9999";
                        setInnerHTML(close,"<img src='"+closeImg+"' border=0 style='position:absolute;top:0px;right:0px;z-index:9999'>");
                        close.onclick=function(){
                           div.parentNode.removeChild(div);
                           cb();
                        }

                        setInnerHTML(div,str+"</div>");
                        var elem=div.childNodes[0];
                        elem.childNodes[0].appendChild(close);
                        setTimeout(function(){
                                return close.onclick();
                        },1000*60*3);
                        //console.log("show ad 300x300 "+jsonPID);

                    }
                },function(){getXPromo(opts,divId,size)})
            })(div,showSlide,tmpParams,_jsonPID);
        });

        var moveCSS3=function(el, distanceToMove, time, timingFunction) {
                if (!time)
                    time = 0;
                if (!timingFunction)
                    timingFunction = "linear";

                el.style.webkitTransform = "translate3d(0," + distanceToMove.y + "px,0)";
                el.style.webkitTransitionDuration = time + "ms";
            }
    }

    AppMobiPromotion = {};
    AppMobiPromotion.getXPromo=getXPromo;
    AppMobiPromotion.getInterstitial=getInterstitial;
})()