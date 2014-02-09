/*
 
 CSS Gradient Editor
 
 Written by Alex Sirota (alex @ iosart.com)

 Copyright (c) Alex Sirota 2010, All Rights Reserved

 Please do not use without permission.

 Portions include software under different licenses





*/
/*  
 *---------------------------------------------------------------------------
 *
 * Prototype JavaScript framework, version 1.6.0
 *   (c) 2005-2007 Sam Stephenson
 *
 *   Prototype is freely distributable under the terms of an MIT-style license.
 *   For details, see the Prototype web site: http://www.prototypejs.org/
 *
 *--------------------------------------------------------------------------*/
var Prototype={
    Version:"1.6.0",
    Browser:{
        IE:!!(window.attachEvent&&!window.opera),
        Opera:!!window.opera,
        WebKit:navigator.userAgent.indexOf("AppleWebKit/")>-1,
        Gecko:navigator.userAgent.indexOf("Gecko")>-1&&navigator.userAgent.indexOf("KHTML")==-1,
        MobileSafari:!!navigator.userAgent.match(/Apple.*Mobile.*Safari/)
        },
    BrowserFeatures:{
        XPath:!!document.evaluate,
        ElementExtensions:!!window.HTMLElement,
        SpecificElementExtensions:document.createElement("div").__proto__&&document.createElement("div").__proto__!==document.createElement("form").__proto__
        },
    ScriptFragment:"<script[^>]*>([\\S\\s]*?)<\/script>",
    JSONFilter:/^\/\*-secure-([\s\S]*)\*\/\s*$/,
    emptyFunction:function(){},
    K:function(a){
        return a
        }
    };

if(Prototype.Browser.MobileSafari){
    Prototype.BrowserFeatures.SpecificElementExtensions=false
        }
        if(Prototype.Browser.WebKit){
    Prototype.BrowserFeatures.XPath=false
        }
        var Class={
    create:function(){
        var e=null,d=$A(arguments);
        if(Object.isFunction(d[0])){
            e=d.shift()
            }
            function a(){
            this.initialize.apply(this,arguments)
            }
            Object.extend(a,Class.Methods);
        a.superclass=e;
        a.subclasses=[];
        if(e){
            var b=function(){};
            
            b.prototype=e.prototype;
            a.prototype=new b;
            e.subclasses.push(a)
            }
            for(var c=0;c<d.length;c++){
            a.addMethods(d[c])
            }
            if(!a.prototype.initialize){
            a.prototype.initialize=Prototype.emptyFunction
            }
            a.prototype.constructor=a;
        return a
        }
    };

Class.Methods={
    addMethods:function(g){
        var c=this.superclass&&this.superclass.prototype;
        var b=Object.keys(g);
        if(!Object.keys({
            toString:true
        }).length){
            b.push("toString","valueOf")
            }
            for(var a=0,d=b.length;a<d;a++){
            var f=b[a],e=g[f];
            if(c&&Object.isFunction(e)&&e.argumentNames().first()=="$super"){
                var h=e,e=Object.extend((function(i){
                    return function(){
                        return c[i].apply(this,arguments)
                        }
                    })(f).wrap(h),{
                    valueOf:function(){
                        return h
                        },
                    toString:function(){
                        return h.toString()
                        }
                    })
        }
        this.prototype[f]=e
        }
        return this
}
};

var Abstract={};

Object.extend=function(a,c){
    for(var b in c){
        a[b]=c[b]
        }
        return a
    };
    
Object.extend(Object,{
    inspect:function(a){
        try{
            if(a===undefined){
                return"undefined"
                }
                if(a===null){
                return"null"
                }
                return a.inspect?a.inspect():a.toString()
            }catch(b){
            if(b instanceof RangeError){
                return"..."
                }
                throw b
            }
        },
toJSON:function(a){
    var c=typeof a;
    switch(c){
        case"undefined":case"function":case"unknown":
            return;
        case"boolean":
            return a.toString()
            }
            if(a===null){
        return"null"
        }
        if(a.toJSON){
        return a.toJSON()
        }
        if(Object.isElement(a)){
        return
    }
    var b=[];
    for(var e in a){
        var d=Object.toJSON(a[e]);
        if(d!==undefined){
            b.push(e.toJSON()+": "+d)
            }
        }
    return"{"+b.join(", ")+"}"
    },
toQueryString:function(a){
    return $H(a).toQueryString()
    },
toHTML:function(a){
    return a&&a.toHTML?a.toHTML():String.interpret(a)
    },
keys:function(a){
    var b=[];
    for(var c in a){
        b.push(c)
        }
        return b
    },
values:function(b){
    var a=[];
    for(var c in b){
        a.push(b[c])
        }
        return a
    },
clone:function(a){
    return Object.extend({},a)
    },
isElement:function(a){
    return a&&a.nodeType==1
    },
isArray:function(a){
    return a&&a.constructor===Array
    },
isHash:function(a){
    return a instanceof Hash
    },
isFunction:function(a){
    return typeof a=="function"
    },
isString:function(a){
    return typeof a=="string"
    },
isNumber:function(a){
    return typeof a=="number"
    },
isUndefined:function(a){
    return typeof a=="undefined"
    }
});
Object.extend(Function.prototype,{
    argumentNames:function(){
        var a=this.toString().match(/^[\s\(]*function[^(]*\((.*?)\)/)[1].split(",").invoke("strip");
        return a.length==1&&!a[0]?[]:a
        },
    bind:function(){
        if(arguments.length<2&&arguments[0]===undefined){
            return this
            }
            var a=this,c=$A(arguments),b=c.shift();
        return function(){
            return a.apply(b,c.concat($A(arguments)))
            }
        },
bindAsEventListener:function(){
    var a=this,c=$A(arguments),b=c.shift();
    return function(d){
        return a.apply(b,[d||window.event].concat(c))
        }
    },
curry:function(){
    if(!arguments.length){
        return this
        }
        var a=this,b=$A(arguments);
    return function(){
        return a.apply(this,b.concat($A(arguments)))
        }
    },
delay:function(){
    var a=this,b=$A(arguments),c=b.shift()*1000;
    return window.setTimeout(function(){
        return a.apply(a,b)
        },c)
    },
wrap:function(b){
    var a=this;
    return function(){
        return b.apply(this,[a.bind(this)].concat($A(arguments)))
        }
    },
methodize:function(){
    if(this._methodized){
        return this._methodized
        }
        var a=this;
    return this._methodized=function(){
        return a.apply(null,[this].concat($A(arguments)))
        }
    }
});
Function.prototype.defer=Function.prototype.delay.curry(0.01);
Date.prototype.toJSON=function(){
    return'"'+this.getUTCFullYear()+"-"+(this.getUTCMonth()+1).toPaddedString(2)+"-"+this.getUTCDate().toPaddedString(2)+"T"+this.getUTCHours().toPaddedString(2)+":"+this.getUTCMinutes().toPaddedString(2)+":"+this.getUTCSeconds().toPaddedString(2)+'Z"'
    };
    
var Try={
    these:function(){
        var c;
        for(var b=0,d=arguments.length;b<d;b++){
            var a=arguments[b];
            try{
                c=a();
                break
            }catch(f){}
        }
        return c
    }
};

RegExp.prototype.match=RegExp.prototype.test;
RegExp.escape=function(a){
    return String(a).replace(/([.*+?^=!:${}()|[\]\/\\])/g,"\\$1")
    };
    
var PeriodicalExecuter=Class.create({
    initialize:function(b,a){
        this.callback=b;
        this.frequency=a;
        this.currentlyExecuting=false;
        this.registerCallback()
        },
    registerCallback:function(){
        this.timer=setInterval(this.onTimerEvent.bind(this),this.frequency*1000)
        },
    execute:function(){
        this.callback(this)
        },
    stop:function(){
        if(!this.timer){
            return
        }
        clearInterval(this.timer);
        this.timer=null
        },
    onTimerEvent:function(){
        if(!this.currentlyExecuting){
            try{
                this.currentlyExecuting=true;
                this.execute()
                }finally{
                this.currentlyExecuting=false
                }
            }
    }
});
Object.extend(String,{
    interpret:function(a){
        return a==null?"":String(a)
        },
    specialChar:{
        "\b":"\\b",
        "\t":"\\t",
        "\n":"\\n",
        "\f":"\\f",
        "\r":"\\r",
        "\\":"\\\\"
    }
});
Object.extend(String.prototype,{
    gsub:function(e,c){
        var a="",d=this,b;
        c=arguments.callee.prepareReplacement(c);
        while(d.length>0){
            if(b=d.match(e)){
                a+=d.slice(0,b.index);
                a+=String.interpret(c(b));
                d=d.slice(b.index+b[0].length)
                }else{
                a+=d,d=""
                }
            }
        return a
    },
sub:function(c,a,b){
    a=this.gsub.prepareReplacement(a);
    b=b===undefined?1:b;
    return this.gsub(c,function(d){
        if(--b<0){
            return d[0]
            }
            return a(d)
        })
    },
scan:function(b,a){
    this.gsub(b,a);
    return String(this)
    },
truncate:function(b,a){
    b=b||30;
    a=a===undefined?"...":a;
    return this.length>b?this.slice(0,b-a.length)+a:String(this)
    },
strip:function(){
    return this.replace(/^\s+/,"").replace(/\s+$/,"")
    },
stripTags:function(){
    return this.replace(/<\/?[^>]+>/gi,"")
    },
stripScripts:function(){
    return this.replace(new RegExp(Prototype.ScriptFragment,"img"),"")
    },
extractScripts:function(){
    var b=new RegExp(Prototype.ScriptFragment,"img");
    var a=new RegExp(Prototype.ScriptFragment,"im");
    return(this.match(b)||[]).map(function(c){
        return(c.match(a)||["",""])[1]
        })
    },
evalScripts:function(){
    return this.extractScripts().map(function(script){
        return eval(script)
        })
    },
escapeHTML:function(){
    var a=arguments.callee;
    a.text.data=this;
    return a.div.innerHTML
    },
unescapeHTML:function(){
    var a=new Element("div");
    a.innerHTML=this.stripTags();
    return a.childNodes[0]?(a.childNodes.length>1?$A(a.childNodes).inject("",function(b,c){
        return b+c.nodeValue
        }):a.childNodes[0].nodeValue):""
    },
toQueryParams:function(b){
    var a=this.strip().match(/([^?#]*)(#.*)?$/);
    if(!a){
        return{}
    }
    return a[1].split(b||"&").inject({},function(e,f){
    if((f=f.split("="))[0]){
        var c=decodeURIComponent(f.shift());
        var d=f.length>1?f.join("="):f[0];
        if(d!=undefined){
            d=decodeURIComponent(d)
            }
            if(c in e){
            if(!Object.isArray(e[c])){
                e[c]=[e[c]]
                }
                e[c].push(d)
            }else{
            e[c]=d
            }
        }
    return e
})
},
toArray:function(){
    return this.split("")
    },
succ:function(){
    return this.slice(0,this.length-1)+String.fromCharCode(this.charCodeAt(this.length-1)+1)
    },
times:function(a){
    return a<1?"":new Array(a+1).join(this)
    },
camelize:function(){
    var d=this.split("-"),a=d.length;
    if(a==1){
        return d[0]
        }
        var c=this.charAt(0)=="-"?d[0].charAt(0).toUpperCase()+d[0].substring(1):d[0];
    for(var b=1;b<a;b++){
        c+=d[b].charAt(0).toUpperCase()+d[b].substring(1)
        }
        return c
    },
capitalize:function(){
    return this.charAt(0).toUpperCase()+this.substring(1).toLowerCase()
    },
underscore:function(){
    return this.gsub(/::/,"/").gsub(/([A-Z]+)([A-Z][a-z])/,"#{1}_#{2}").gsub(/([a-z\d])([A-Z])/,"#{1}_#{2}").gsub(/-/,"_").toLowerCase()
    },
dasherize:function(){
    return this.gsub(/_/,"-")
    },
inspect:function(b){
    var a=this.gsub(/[\x00-\x1f\\]/,function(c){
        var d=String.specialChar[c[0]];
        return d?d:"\\u00"+c[0].charCodeAt().toPaddedString(2,16)
        });
    if(b){
        return'"'+a.replace(/"/g,'\\"')+'"'
        }
        return"'"+a.replace(/'/g,"\\'")+"'"
    },
toJSON:function(){
    return this.inspect(true)
    },
unfilterJSON:function(a){
    return this.sub(a||Prototype.JSONFilter,"#{1}")
    },
isJSON:function(){
    var a=this.replace(/\\./g,"@").replace(/"[^"\\\n\r]*"/g,"");
    return(/^[,:{}\[\]0-9.\-+Eaeflnr-u \n\r\t]*$/).test(a)
    },
evalJSON:function(sanitize){
    var json=this.unfilterJSON();
    try{
        if(!sanitize||json.isJSON()){
            return eval("("+json+")")
            }
        }catch(e){}
throw new SyntaxError("Badly formed JSON string: "+this.inspect())
},
include:function(a){
    return this.indexOf(a)>-1
    },
startsWith:function(a){
    return this.indexOf(a)===0
    },
endsWith:function(a){
    var b=this.length-a.length;
    return b>=0&&this.lastIndexOf(a)===b
    },
empty:function(){
    return this==""
    },
blank:function(){
    return/^\s*$/.test(this)
    },
interpolate:function(a,b){
    return new Template(this,b).evaluate(a)
    }
});
if(Prototype.Browser.WebKit||Prototype.Browser.IE){
    Object.extend(String.prototype,{
        escapeHTML:function(){
            return this.replace(/&/g,"&amp;").replace(/</g,"&lt;").replace(/>/g,"&gt;")
            },
        unescapeHTML:function(){
            return this.replace(/&amp;/g,"&").replace(/&lt;/g,"<").replace(/&gt;/g,">")
            }
        })
    }
    String.prototype.gsub.prepareReplacement=function(b){
    if(Object.isFunction(b)){
        return b
        }
        var a=new Template(b);
    return function(c){
        return a.evaluate(c)
        }
    };

String.prototype.parseQuery=String.prototype.toQueryParams;
Object.extend(String.prototype.escapeHTML,{
    div:document.createElement("div"),
    text:document.createTextNode("")
    });
with(String.prototype.escapeHTML){
    div.appendChild(text)
        }
        var Template=Class.create({
    initialize:function(a,b){
        this.template=a.toString();
        this.pattern=b||Template.Pattern
        },
    evaluate:function(a){
        if(Object.isFunction(a.toTemplateReplacements)){
            a=a.toTemplateReplacements()
            }
            return this.template.gsub(this.pattern,function(d){
            if(a==null){
                return""
                }
                var f=d[1]||"";
            if(f=="\\"){
                return d[2]
                }
                var b=a,g=d[3];
            var e=/^([^.[]+|\[((?:.*?[^\\])?)\])(\.|\[|$)/,d=e.exec(g);
            if(d==null){
                return f
                }while(d!=null){
                var c=d[1].startsWith("[")?d[2].gsub("\\\\]","]"):d[1];
                b=b[c];
                if(null==b||""==d[3]){
                    break
                }
                g=g.substring("["==d[3]?d[1].length:d[0].length);
                d=e.exec(g)
                }
                return f+String.interpret(b)
            }.bind(this))
        }
    });
Template.Pattern=/(^|.|\r|\n)(#\{(.*?)\})/;
var $break={};

var Enumerable={
    each:function(c,b){
        var a=0;
        c=c.bind(b);
        try{
            this._each(function(e){
                c(e,a++)
                })
            }catch(d){
            if(d!=$break){
                throw d
                }
            }
        return this
    },
eachSlice:function(d,c,b){
    c=c?c.bind(b):Prototype.K;
    var a=-d,e=[],f=this.toArray();
    while((a+=d)<f.length){
        e.push(f.slice(a,a+d))
        }
        return e.collect(c,b)
    },
all:function(c,b){
    c=c?c.bind(b):Prototype.K;
    var a=true;
    this.each(function(e,d){
        a=a&&!!c(e,d);
        if(!a){
            throw $break
            }
        });
return a
},
any:function(c,b){
    c=c?c.bind(b):Prototype.K;
    var a=false;
    this.each(function(e,d){
        if(a=!!c(e,d)){
            throw $break
            }
        });
return a
},
collect:function(c,b){
    c=c?c.bind(b):Prototype.K;
    var a=[];
    this.each(function(e,d){
        a.push(c(e,d))
        });
    return a
    },
detect:function(c,b){
    c=c.bind(b);
    var a;
    this.each(function(e,d){
        if(c(e,d)){
            a=e;
            throw $break
            }
        });
return a
},
findAll:function(c,b){
    c=c.bind(b);
    var a=[];
    this.each(function(e,d){
        if(c(e,d)){
            a.push(e)
            }
        });
return a
},
grep:function(d,c,b){
    c=c?c.bind(b):Prototype.K;
    var a=[];
    if(Object.isString(d)){
        d=new RegExp(d)
        }
        this.each(function(f,e){
        if(d.match(f)){
            a.push(c(f,e))
            }
        });
return a
},
include:function(a){
    if(Object.isFunction(this.indexOf)){
        if(this.indexOf(a)!=-1){
            return true
            }
        }
    var b=false;
this.each(function(c){
    if(c==a){
        b=true;
        throw $break
        }
    });
return b
},
inGroupsOf:function(b,a){
    a=a===undefined?null:a;
    return this.eachSlice(b,function(c){
        while(c.length<b){
            c.push(a)
            }
            return c
        })
    },
inject:function(a,c,b){
    c=c.bind(b);
    this.each(function(e,d){
        a=c(a,e,d)
        });
    return a
    },
invoke:function(b){
    var a=$A(arguments).slice(1);
    return this.map(function(c){
        return c[b].apply(c,a)
        })
    },
max:function(c,b){
    c=c?c.bind(b):Prototype.K;
    var a;
    this.each(function(e,d){
        e=c(e,d);
        if(a==undefined||e>=a){
            a=e
            }
        });
return a
},
min:function(c,b){
    c=c?c.bind(b):Prototype.K;
    var a;
    this.each(function(e,d){
        e=c(e,d);
        if(a==undefined||e<a){
            a=e
            }
        });
return a
},
partition:function(d,b){
    d=d?d.bind(b):Prototype.K;
    var c=[],a=[];
    this.each(function(f,e){
        (d(f,e)?c:a).push(f)
        });
    return[c,a]
    },
pluck:function(b){
    var a=[];
    this.each(function(c){
        a.push(c[b])
        });
    return a
    },
reject:function(c,b){
    c=c.bind(b);
    var a=[];
    this.each(function(e,d){
        if(!c(e,d)){
            a.push(e)
            }
        });
return a
},
sortBy:function(b,a){
    b=b.bind(a);
    return this.map(function(d,c){
        return{
            value:d,
            criteria:b(d,c)
            }
        }).sort(function(f,e){
    var d=f.criteria,c=e.criteria;
    return d<c?-1:d>c?1:0
    }).pluck("value")
},
toArray:function(){
    return this.map()
    },
zip:function(){
    var b=Prototype.K,a=$A(arguments);
    if(Object.isFunction(a.last())){
        b=a.pop()
        }
        var c=[this].concat(a).map($A);
    return this.map(function(e,d){
        return b(c.pluck(d))
        })
    },
size:function(){
    return this.toArray().length
    },
inspect:function(){
    return"#<Enumerable:"+this.toArray().inspect()+">"
    }
};

Object.extend(Enumerable,{
    map:Enumerable.collect,
    find:Enumerable.detect,
    select:Enumerable.findAll,
    filter:Enumerable.findAll,
    member:Enumerable.include,
    entries:Enumerable.toArray,
    every:Enumerable.all,
    some:Enumerable.any
    });
function $A(c){
    if(!c){
        return[]
        }
        if(c.toArray){
        return c.toArray()
        }
        var b=c.length,a=new Array(b);
    while(b--){
        a[b]=c[b]
        }
        return a
    }
    if(Prototype.Browser.WebKit){
    function $A(c){
        if(!c){
            return[]
            }
            if(!(Object.isFunction(c)&&c=="[object NodeList]")&&c.toArray){
            return c.toArray()
            }
            var b=c.length,a=new Array(b);
        while(b--){
            a[b]=c[b]
            }
            return a
        }
    }
Array.from=$A;
Object.extend(Array.prototype,Enumerable);
if(!Array.prototype._reverse){
    Array.prototype._reverse=Array.prototype.reverse
        }
        Object.extend(Array.prototype,{
    _each:function(b){
        for(var a=0,c=this.length;a<c;a++){
            b(this[a])
            }
        },
clear:function(){
    this.length=0;
    return this
    },
first:function(){
    return this[0]
    },
last:function(){
    return this[this.length-1]
    },
compact:function(){
    return this.select(function(a){
        return a!=null
        })
    },
flatten:function(){
    return this.inject([],function(b,a){
        return b.concat(Object.isArray(a)?a.flatten():[a])
        })
    },
without:function(){
    var a=$A(arguments);
    return this.select(function(b){
        return !a.include(b)
        })
    },
reverse:function(a){
    return(a!==false?this:this.toArray())._reverse()
    },
reduce:function(){
    return this.length>1?this:this[0]
    },
uniq:function(a){
    return this.inject([],function(d,c,b){
        if(0==b||(a?d.last()!=c:!d.include(c))){
            d.push(c)
            }
            return d
        })
    },
intersect:function(a){
    return this.uniq().findAll(function(b){
        return a.detect(function(c){
            return b===c
            })
        })
    },
clone:function(){
    return[].concat(this)
    },
size:function(){
    return this.length
    },
inspect:function(){
    return"["+this.map(Object.inspect).join(", ")+"]"
    },
toJSON:function(){
    var a=[];
    this.each(function(b){
        var c=Object.toJSON(b);
        if(c!==undefined){
            a.push(c)
            }
        });
return"["+a.join(", ")+"]"
    }
});
if(Object.isFunction(Array.prototype.forEach)){
    Array.prototype._each=Array.prototype.forEach
        }
        if(!Array.prototype.indexOf){
    Array.prototype.indexOf=function(c,a){
        a||(a=0);
        var b=this.length;
        if(a<0){
            a=b+a
            }
            for(;a<b;a++){
            if(this[a]===c){
                return a
                }
            }
        return -1
    }
    }
if(!Array.prototype.lastIndexOf){
    Array.prototype.lastIndexOf=function(b,a){
        a=isNaN(a)?this.length:(a<0?this.length+a:a)+1;
        var c=this.slice(0,a).reverse().indexOf(b);
        return(c<0)?c:a-c-1
        }
    }
    Array.prototype.toArray=Array.prototype.clone;
function $w(a){
    if(!Object.isString(a)){
        return[]
        }
        a=a.strip();
    return a?a.split(/\s+/):[]
    }
    if(Prototype.Browser.Opera){
    Array.prototype.concat=function(){
        var e=[];
        for(var b=0,c=this.length;b<c;b++){
            e.push(this[b])
            }
            for(var b=0,c=arguments.length;b<c;b++){
            if(Object.isArray(arguments[b])){
                for(var a=0,d=arguments[b].length;a<d;a++){
                    e.push(arguments[b][a])
                    }
                }else{
            e.push(arguments[b])
            }
        }
        return e
    }
}
Object.extend(Number.prototype,{
    toColorPart:function(){
        return this.toPaddedString(2,16)
        },
    succ:function(){
        return this+1
        },
    times:function(a){
        $R(0,this,true).each(a);
        return this
        },
    toPaddedString:function(c,b){
        var a=this.toString(b||10);
        return"0".times(c-a.length)+a
        },
    toJSON:function(){
        return isFinite(this)?this.toString():"null"
        }
    });
$w("abs round ceil floor").each(function(a){
    Number.prototype[a]=Math[a].methodize()
    });
function $H(a){
    return new Hash(a)
    }
    var Hash=Class.create(Enumerable,(function(){
    if(function(){
        var c=0,e=function(f){
            this.key=f
            };
            
        e.prototype.key="foo";
        for(var d in new e("bar")){
            c++
        }
        return c>1
        }()){
        function b(e){
            var c=[];
            for(var d in this._object){
                var f=this._object[d];
                if(c.include(d)){
                    continue
                }
                c.push(d);
                var g=[d,f];
                g.key=d;
                g.value=f;
                e(g)
                }
            }
            }else{
    function b(d){
        for(var c in this._object){
            var e=this._object[c],f=[c,e];
            f.key=c;
            f.value=e;
            d(f)
            }
        }
        }
function a(c,d){
    if(Object.isUndefined(d)){
        return c
        }
        return c+"="+encodeURIComponent(String.interpret(d))
    }
    return{
    initialize:function(c){
        this._object=Object.isHash(c)?c.toObject():Object.clone(c)
        },
    _each:b,
    set:function(c,d){
        return this._object[c]=d
        },
    get:function(c){
        return this._object[c]
        },
    unset:function(c){
        var d=this._object[c];
        delete this._object[c];
        return d
        },
    toObject:function(){
        return Object.clone(this._object)
        },
    keys:function(){
        return this.pluck("key")
        },
    values:function(){
        return this.pluck("value")
        },
    index:function(d){
        var c=this.detect(function(e){
            return e.value===d
            });
        return c&&c.key
        },
    merge:function(c){
        return this.clone().update(c)
        },
    update:function(c){
        return new Hash(c).inject(this,function(d,e){
            d.set(e.key,e.value);
            return d
            })
        },
    toQueryString:function(){
        return this.map(function(e){
            var d=encodeURIComponent(e.key),c=e.value;
            if(c&&typeof c=="object"){
                if(Object.isArray(c)){
                    return c.map(a.curry(d)).join("&")
                    }
                }
            return a(d,c)
            }).join("&")
    },
inspect:function(){
    return"#<Hash:{"+this.map(function(c){
        return c.map(Object.inspect).join(": ")
        }).join(", ")+"}>"
    },
toJSON:function(){
    return Object.toJSON(this.toObject())
    },
clone:function(){
    return new Hash(this)
    }
}
})());
Hash.prototype.toTemplateReplacements=Hash.prototype.toObject;
Hash.from=$H;
var ObjectRange=Class.create(Enumerable,{
    initialize:function(c,a,b){
        this.start=c;
        this.end=a;
        this.exclusive=b
        },
    _each:function(a){
        var b=this.start;
        while(this.include(b)){
            a(b);
            b=b.succ()
            }
        },
include:function(a){
    if(a<this.start){
        return false
        }
        if(this.exclusive){
        return a<this.end
        }
        return a<=this.end
    }
});
var $R=function(c,a,b){
    return new ObjectRange(c,a,b)
    };
    
var Ajax={
    getTransport:function(){
        return Try.these(function(){
            return new XMLHttpRequest()
            },function(){
            return new ActiveXObject("Msxml2.XMLHTTP")
            },function(){
            return new ActiveXObject("Microsoft.XMLHTTP")
            })||false
        },
    activeRequestCount:0
};

Ajax.Responders={
    responders:[],
    _each:function(a){
        this.responders._each(a)
        },
    register:function(a){
        if(!this.include(a)){
            this.responders.push(a)
            }
        },
unregister:function(a){
    this.responders=this.responders.without(a)
    },
dispatch:function(d,b,c,a){
    this.each(function(f){
        if(Object.isFunction(f[d])){
            try{
                f[d].apply(f,[b,c,a])
                }catch(g){}
        }
    })
}
};

Object.extend(Ajax.Responders,Enumerable);
Ajax.Responders.register({
    onCreate:function(){
        Ajax.activeRequestCount++
    },
    onComplete:function(){
        Ajax.activeRequestCount--
    }
});
Ajax.Base=Class.create({
    initialize:function(a){
        this.options={
            method:"post",
            asynchronous:true,
            contentType:"application/x-www-form-urlencoded",
            encoding:"UTF-8",
            parameters:"",
            evalJSON:true,
            evalJS:true
        };
        
        Object.extend(this.options,a||{});
        this.options.method=this.options.method.toLowerCase();
        if(Object.isString(this.options.parameters)){
            this.options.parameters=this.options.parameters.toQueryParams()
            }
        }
});
Ajax.Request=Class.create(Ajax.Base,{
    _complete:false,
    initialize:function($super,b,a){
        $super(a);
        this.transport=Ajax.getTransport();
        this.request(b)
        },
    request:function(b){
        this.url=b;
        this.method=this.options.method;
        var d=Object.clone(this.options.parameters);
        if(!["get","post"].include(this.method)){
            d._method=this.method;
            this.method="post"
            }
            this.parameters=d;
        if(d=Object.toQueryString(d)){
            if(this.method=="get"){
                this.url+=(this.url.include("?")?"&":"?")+d
                }else{
                if(/Konqueror|Safari|KHTML/.test(navigator.userAgent)){
                    d+="&_="
                    }
                }
        }
    try{
    var a=new Ajax.Response(this);
    if(this.options.onCreate){
        this.options.onCreate(a)
        }
        Ajax.Responders.dispatch("onCreate",this,a);
    this.transport.open(this.method.toUpperCase(),this.url,this.options.asynchronous);
    if(this.options.asynchronous){
        this.respondToReadyState.bind(this).defer(1)
        }
        this.transport.onreadystatechange=this.onStateChange.bind(this);
    this.setRequestHeaders();
    this.body=this.method=="post"?(this.options.postBody||d):null;
    this.transport.send(this.body);
    if(!this.options.asynchronous&&this.transport.overrideMimeType){
        this.onStateChange()
        }
    }catch(c){
    this.dispatchException(c)
    }
},
onStateChange:function(){
    var a=this.transport.readyState;
    if(a>1&&!((a==4)&&this._complete)){
        this.respondToReadyState(this.transport.readyState)
        }
    },
setRequestHeaders:function(){
    var e={
        "X-Requested-With":"XMLHttpRequest",
        "X-Prototype-Version":Prototype.Version,
        Accept:"text/javascript, text/html, application/xml, text/xml, */*"
    };
    
    if(this.method=="post"){
        e["Content-type"]=this.options.contentType+(this.options.encoding?"; charset="+this.options.encoding:"");
        if(this.transport.overrideMimeType&&(navigator.userAgent.match(/Gecko\/(\d{4})/)||[0,2005])[1]<2005){
            e.Connection="close"
            }
        }
    if(typeof this.options.requestHeaders=="object"){
    var c=this.options.requestHeaders;
    if(Object.isFunction(c.push)){
        for(var b=0,d=c.length;b<d;b+=2){
            e[c[b]]=c[b+1]
            }
        }else{
    $H(c).each(function(f){
        e[f.key]=f.value
        })
    }
}
for(var a in e){
    this.transport.setRequestHeader(a,e[a])
    }
},
success:function(){
    var a=this.getStatus();
    return !a||(a>=200&&a<300)
    },
getStatus:function(){
    try{
        return this.transport.status||0
        }catch(a){
        return 0
        }
    },
respondToReadyState:function(a){
    var c=Ajax.Request.Events[a],b=new Ajax.Response(this);
    if(c=="Complete"){
        try{
            this._complete=true;
            (this.options["on"+b.status]||this.options["on"+(this.success()?"Success":"Failure")]||Prototype.emptyFunction)(b,b.headerJSON)
            }catch(d){
            this.dispatchException(d)
            }
            var f=b.getHeader("Content-type");
        if(this.options.evalJS=="force"||(this.options.evalJS&&f&&f.match(/^\s*(text|application)\/(x-)?(java|ecma)script(;.*)?\s*$/i))){
            this.evalResponse()
            }
        }
    try{
    (this.options["on"+c]||Prototype.emptyFunction)(b,b.headerJSON);
    Ajax.Responders.dispatch("on"+c,this,b,b.headerJSON)
    }catch(d){
    this.dispatchException(d)
    }
    if(c=="Complete"){
    this.transport.onreadystatechange=Prototype.emptyFunction
    }
},
getHeader:function(a){
    try{
        return this.transport.getResponseHeader(a)
        }catch(b){
        return null
        }
    },
evalResponse:function(){
    try{
        return eval((this.transport.responseText||"").unfilterJSON())
        }catch(e){
        this.dispatchException(e)
        }
    },
dispatchException:function(a){
    (this.options.onException||Prototype.emptyFunction)(this,a);
    Ajax.Responders.dispatch("onException",this,a)
    }
});
Ajax.Request.Events=["Uninitialized","Loading","Loaded","Interactive","Complete"];
Ajax.Response=Class.create({
    initialize:function(c){
        this.request=c;
        var d=this.transport=c.transport,a=this.readyState=d.readyState;
        if((a>2&&!Prototype.Browser.IE)||a==4){
            this.status=this.getStatus();
            this.statusText=this.getStatusText();
            this.responseText=String.interpret(d.responseText);
            this.headerJSON=this._getHeaderJSON()
            }
            if(a==4){
            var b=d.responseXML;
            this.responseXML=b===undefined?null:b;
            this.responseJSON=this._getResponseJSON()
            }
        },
status:0,
statusText:"",
getStatus:Ajax.Request.prototype.getStatus,
getStatusText:function(){
    try{
        return this.transport.statusText||""
        }catch(a){
        return""
        }
    },
    getHeader:Ajax.Request.prototype.getHeader,
    getAllHeaders:function(){
    try{
        return this.getAllResponseHeaders()
        }catch(a){
        return null
        }
    },
getResponseHeader:function(a){
    return this.transport.getResponseHeader(a)
    },
getAllResponseHeaders:function(){
    return this.transport.getAllResponseHeaders()
    },
_getHeaderJSON:function(){
    var a=this.getHeader("X-JSON");
    if(!a){
        return null
        }
        a=decodeURIComponent(escape(a));
    try{
        return a.evalJSON(this.request.options.sanitizeJSON)
        }catch(b){
        this.request.dispatchException(b)
        }
    },
_getResponseJSON:function(){
    var a=this.request.options;
    if(!a.evalJSON||(a.evalJSON!="force"&&!(this.getHeader("Content-type")||"").include("application/json"))){
        return null
        }
        try{
        return this.transport.responseText.evalJSON(a.sanitizeJSON)
        }catch(b){
        this.request.dispatchException(b)
        }
    }
});
Ajax.Updater=Class.create(Ajax.Request,{
    initialize:function($super,a,c,b){
        this.container={
            success:(a.success||a),
            failure:(a.failure||(a.success?null:a))
            };
            
        b=b||{};
        
        var d=b.onComplete;
        b.onComplete=(function(e,f){
            this.updateContent(e.responseText);
            if(Object.isFunction(d)){
                d(e,f)
                }
            }).bind(this);
    $super(c,b)
    },
updateContent:function(d){
    var c=this.container[this.success()?"success":"failure"],a=this.options;
    if(!a.evalScripts){
        d=d.stripScripts()
        }
        if(c=$(c)){
        if(a.insertion){
            if(Object.isString(a.insertion)){
                var b={};
                
                b[a.insertion]=d;
                c.insert(b)
                }else{
                a.insertion(c,d)
                }
            }else{
        c.update(d)
        }
    }
if(this.success()){
    if(this.onComplete){
        this.onComplete.bind(this).defer()
        }
    }
}
});
Ajax.PeriodicalUpdater=Class.create(Ajax.Base,{
    initialize:function($super,a,c,b){
        $super(b);
        this.onComplete=this.options.onComplete;
        this.frequency=(this.options.frequency||2);
        this.decay=(this.options.decay||1);
        this.updater={};
        
        this.container=a;
        this.url=c;
        this.start()
        },
    start:function(){
        this.options.onComplete=this.updateComplete.bind(this);
        this.onTimerEvent()
        },
    stop:function(){
        this.updater.options.onComplete=undefined;
        clearTimeout(this.timer);
        (this.onComplete||Prototype.emptyFunction).apply(this,arguments)
        },
    updateComplete:function(a){
        if(this.options.decay){
            this.decay=(a.responseText==this.lastText?this.decay*this.options.decay:1);
            this.lastText=a.responseText
            }
            this.timer=this.onTimerEvent.bind(this).delay(this.decay*this.frequency)
        },
    onTimerEvent:function(){
        this.updater=new Ajax.Updater(this.container,this.url,this.options)
        }
    });
function $(b){
    if(arguments.length>1){
        for(var a=0,d=[],c=arguments.length;a<c;a++){
            d.push($(arguments[a]))
            }
            return d
        }
        if(Object.isString(b)){
        b=document.getElementById(b)
        }
        return Element.extend(b)
    }
    if(Prototype.BrowserFeatures.XPath){
    document._getElementsByXPath=function(f,a){
        var c=[];
        var e=document.evaluate(f,$(a)||document,null,XPathResult.ORDERED_NODE_SNAPSHOT_TYPE,null);
        for(var b=0,d=e.snapshotLength;b<d;b++){
            c.push(Element.extend(e.snapshotItem(b)))
            }
            return c
        }
    }
    if(!window.Node){
    var Node={}
}
if(!Node.ELEMENT_NODE){
    Object.extend(Node,{
        ELEMENT_NODE:1,
        ATTRIBUTE_NODE:2,
        TEXT_NODE:3,
        CDATA_SECTION_NODE:4,
        ENTITY_REFERENCE_NODE:5,
        ENTITY_NODE:6,
        PROCESSING_INSTRUCTION_NODE:7,
        COMMENT_NODE:8,
        DOCUMENT_NODE:9,
        DOCUMENT_TYPE_NODE:10,
        DOCUMENT_FRAGMENT_NODE:11,
        NOTATION_NODE:12
    })
    }(function(){
    var a=this.Element;
    this.Element=function(d,c){
        c=c||{};
        
        d=d.toLowerCase();
        var b=Element.cache;
        if(Prototype.Browser.IE&&c.name){
            d="<"+d+' name="'+c.name+'">';
            delete c.name;
            return Element.writeAttribute(document.createElement(d),c)
            }
            if(!b[d]){
            b[d]=Element.extend(document.createElement(d))
            }
            return Element.writeAttribute(b[d].cloneNode(false),c)
        };
        
    Object.extend(this.Element,a||{})
    }).call(window);
Element.cache={};
    
Element.Methods={
    visible:function(a){
        return $(a).style.display!="none"
        },
    toggle:function(a){
        a=$(a);
        Element[Element.visible(a)?"hide":"show"](a);
        return a
        },
    hide:function(a){
        $(a).style.display="none";
        return a
        },
    show:function(a){
        $(a).style.display="";
        return a
        },
    remove:function(a){
        a=$(a);
        a.parentNode.removeChild(a);
        return a
        },
    update:function(a,b){
        a=$(a);
        if(b&&b.toElement){
            b=b.toElement()
            }
            if(Object.isElement(b)){
            return a.update().insert(b)
            }
            b=Object.toHTML(b);
        a.innerHTML=b.stripScripts();
        b.evalScripts.bind(b).defer();
        return a
        },
    replace:function(b,c){
        b=$(b);
        if(c&&c.toElement){
            c=c.toElement()
            }else{
            if(!Object.isElement(c)){
                c=Object.toHTML(c);
                var a=b.ownerDocument.createRange();
                a.selectNode(b);
                c.evalScripts.bind(c).defer();
                c=a.createContextualFragment(c.stripScripts())
                }
            }
        b.parentNode.replaceChild(c,b);
    return b
    },
insert:function(c,e){
    c=$(c);
    if(Object.isString(e)||Object.isNumber(e)||Object.isElement(e)||(e&&(e.toElement||e.toHTML))){
        e={
            bottom:e
        }
    }
    var d,b,a;
for(position in e){
    d=e[position];
    position=position.toLowerCase();
    b=Element._insertionTranslations[position];
    if(d&&d.toElement){
        d=d.toElement()
        }
        if(Object.isElement(d)){
        b.insert(c,d);
        continue
    }
    d=Object.toHTML(d);
    a=c.ownerDocument.createRange();
    b.initializeRange(c,a);
    b.insert(c,a.createContextualFragment(d.stripScripts()));
    d.evalScripts.bind(d).defer()
    }
    return c
},
wrap:function(b,c,a){
    b=$(b);
    if(Object.isElement(c)){
        $(c).writeAttribute(a||{})
        }else{
        if(Object.isString(c)){
            c=new Element(c,a)
            }else{
            c=new Element("div",c)
            }
        }
    if(b.parentNode){
    b.parentNode.replaceChild(c,b)
    }
    c.appendChild(b);
return c
},
inspect:function(b){
    b=$(b);
    var a="<"+b.tagName.toLowerCase();
    $H({
        id:"id",
        className:"class"
    }).each(function(f){
        var e=f.first(),c=f.last();
        var d=(b[e]||"").toString();
        if(d){
            a+=" "+c+"="+d.inspect(true)
            }
        });
return a+">"
},
recursivelyCollect:function(a,c){
    a=$(a);
    var b=[];
    while(a=a[c]){
        if(a.nodeType==1){
            b.push(Element.extend(a))
            }
        }
    return b
},
ancestors:function(a){
    return $(a).recursivelyCollect("parentNode")
    },
descendants:function(a){
    return $A($(a).getElementsByTagName("*")).each(Element.extend)
    },
firstDescendant:function(a){
    a=$(a).firstChild;
    while(a&&a.nodeType!=1){
        a=a.nextSibling
        }
        return $(a)
    },
immediateDescendants:function(a){
    if(!(a=$(a).firstChild)){
        return[]
        }while(a&&a.nodeType!=1){
        a=a.nextSibling
        }
        if(a){
        return[a].concat($(a).nextSiblings())
        }
        return[]
    },
previousSiblings:function(a){
    return $(a).recursivelyCollect("previousSibling")
    },
nextSiblings:function(a){
    return $(a).recursivelyCollect("nextSibling")
    },
siblings:function(a){
    a=$(a);
    return a.previousSiblings().reverse().concat(a.nextSiblings())
    },
match:function(b,a){
    if(Object.isString(a)){
        a=new Selector(a)
        }
        return a.match($(b))
    },
up:function(b,d,a){
    b=$(b);
    if(arguments.length==1){
        return $(b.parentNode)
        }
        var c=b.ancestors();
    return d?Selector.findElement(c,d,a):c[a||0]
    },
down:function(b,c,a){
    b=$(b);
    if(arguments.length==1){
        return b.firstDescendant()
        }
        var d=b.descendants();
    return c?Selector.findElement(d,c,a):d[a||0]
    },
previous:function(b,d,a){
    b=$(b);
    if(arguments.length==1){
        return $(Selector.handlers.previousElementSibling(b))
        }
        var c=b.previousSiblings();
    return d?Selector.findElement(c,d,a):c[a||0]
    },
next:function(c,d,b){
    c=$(c);
    if(arguments.length==1){
        return $(Selector.handlers.nextElementSibling(c))
        }
        var a=c.nextSiblings();
    return d?Selector.findElement(a,d,b):a[b||0]
    },
select:function(){
    var a=$A(arguments),b=$(a.shift());
    return Selector.findChildElements(b,a)
    },
adjacent:function(){
    var a=$A(arguments),b=$(a.shift());
    return Selector.findChildElements(b.parentNode,a).without(b)
    },
identify:function(b){
    b=$(b);
    var c=b.readAttribute("id"),a=arguments.callee;
    if(c){
        return c
        }
        do{
        c="anonymous_element_"+a.counter++
    }while($(c));
    b.writeAttribute("id",c);
    return c
    },
readAttribute:function(c,a){
    c=$(c);
    if(Prototype.Browser.IE){
        var b=Element._attributeTranslations.read;
        if(b.values[a]){
            return b.values[a](c,a)
            }
            if(b.names[a]){
            a=b.names[a]
            }
            if(a.include(":")){
            return(!c.attributes||!c.attributes[a])?null:c.attributes[a].value
            }
        }
    return c.getAttribute(a)
},
writeAttribute:function(e,c,f){
    e=$(e);
    var b={},d=Element._attributeTranslations.write;
    if(typeof c=="object"){
        b=c
        }else{
        b[c]=f===undefined?true:f
        }
        for(var a in b){
        var c=d.names[a]||a,f=b[a];
        if(d.values[a]){
            c=d.values[a](e,f)
            }
            if(f===false||f===null){
            e.removeAttribute(c)
            }else{
            if(f===true){
                e.setAttribute(c,c)
                }else{
                e.setAttribute(c,f)
                }
            }
    }
    return e
},
getHeight:function(a){
    return $(a).getDimensions().height
    },
getWidth:function(a){
    return $(a).getDimensions().width
    },
classNames:function(a){
    return new Element.ClassNames(a)
    },
hasClassName:function(a,b){
    if(!(a=$(a))){
        return
    }
    var c=a.className;
    return(c.length>0&&(c==b||new RegExp("(^|\\s)"+b+"(\\s|$)").test(c)))
    },
addClassName:function(a,b){
    if(!(a=$(a))){
        return
    }
    if(!a.hasClassName(b)){
        a.className+=(a.className?" ":"")+b
        }
        return a
    },
removeClassName:function(a,b){
    if(!(a=$(a))){
        return
    }
    a.className=a.className.replace(new RegExp("(^|\\s+)"+b+"(\\s+|$)")," ").strip();
    return a
    },
toggleClassName:function(a,b){
    if(!(a=$(a))){
        return
    }
    return a[a.hasClassName(b)?"removeClassName":"addClassName"](b)
    },
cleanWhitespace:function(b){
    b=$(b);
    var c=b.firstChild;
    while(c){
        var a=c.nextSibling;
        if(c.nodeType==3&&!/\S/.test(c.nodeValue)){
            b.removeChild(c)
            }
            c=a
        }
        return b
    },
empty:function(a){
    return $(a).innerHTML.blank()
    },
descendantOf:function(f,d){
    f=$(f),d=$(d);
    if(f.compareDocumentPosition){
        return(f.compareDocumentPosition(d)&8)===8
        }
        if(f.sourceIndex&&!Prototype.Browser.Opera){
        var g=f.sourceIndex,c=d.sourceIndex,b=d.nextSibling;
        if(!b){
            do{
                d=d.parentNode
                }while(!(b=d.nextSibling)&&d.parentNode)
        }
        if(b){
            return(g>c&&g<b.sourceIndex)
            }
        }while(f=f.parentNode){
    if(f==d){
        return true
        }
    }
return false
},
scrollTo:function(a){
    a=$(a);
    var b=a.cumulativeOffset();
    window.scrollTo(b[0],b[1]);
    return a
    },
getStyle:function(b,c){
    b=$(b);
    c=c=="float"?"cssFloat":c.camelize();
    var d=b.style[c];
    if(!d){
        var a=document.defaultView.getComputedStyle(b,null);
        d=a?a[c]:null
        }
        if(c=="opacity"){
        return d?parseFloat(d):1
        }
        return d=="auto"?null:d
    },
getOpacity:function(a){
    return $(a).getStyle("opacity")
    },
setStyle:function(b,c){
    b=$(b);
    var e=b.style,a;
    if(Object.isString(c)){
        b.style.cssText+=";"+c;
        return c.include("opacity")?b.setOpacity(c.match(/opacity:\s*(\d?\.?\d*)/)[1]):b
        }
        for(var d in c){
        if(d=="opacity"){
            b.setOpacity(c[d])
            }else{
            e[(d=="float"||d=="cssFloat")?(e.styleFloat===undefined?"cssFloat":"styleFloat"):d]=c[d]
            }
        }
    return b
},
setOpacity:function(a,b){
    a=$(a);
    a.style.opacity=(b==1||b==="")?"":(b<0.00001)?0:b;
    return a
    },
getDimensions:function(c){
    c=$(c);
    var g=$(c).getStyle("display");
    if(g!="none"&&g!=null){
        return{
            width:c.offsetWidth,
            height:c.offsetHeight
            }
        }
    var b=c.style;
var f=b.visibility;
var d=b.position;
var a=b.display;
b.visibility="hidden";
b.position="absolute";
b.display="block";
var h=c.clientWidth;
var e=c.clientHeight;
b.display=a;
b.position=d;
b.visibility=f;
return{
    width:h,
    height:e
}
},
makePositioned:function(a){
    a=$(a);
    var b=Element.getStyle(a,"position");
    if(b=="static"||!b){
        a._madePositioned=true;
        a.style.position="relative";
        if(window.opera){
            a.style.top=0;
            a.style.left=0
            }
        }
    return a
},
undoPositioned:function(a){
    a=$(a);
    if(a._madePositioned){
        a._madePositioned=undefined;
        a.style.position=a.style.top=a.style.left=a.style.bottom=a.style.right=""
        }
        return a
    },
makeClipping:function(a){
    a=$(a);
    if(a._overflow){
        return a
        }
        a._overflow=Element.getStyle(a,"overflow")||"auto";
    if(a._overflow!=="hidden"){
        a.style.overflow="hidden"
        }
        return a
    },
undoClipping:function(a){
    a=$(a);
    if(!a._overflow){
        return a
        }
        a.style.overflow=a._overflow=="auto"?"":a._overflow;
    a._overflow=null;
    return a
    },
cumulativeOffset:function(b){
    var a=0,c=0;
    do{
        a+=b.offsetTop||0;
        c+=b.offsetLeft||0;
        b=b.offsetParent
        }while(b);
    return Element._returnOffset(c,a)
    },
positionedOffset:function(b){
    var a=0,d=0;
    do{
        a+=b.offsetTop||0;
        d+=b.offsetLeft||0;
        b=b.offsetParent;
        if(b){
            if(b.tagName=="BODY"){
                break
            }
            var c=Element.getStyle(b,"position");
            if(c=="relative"||c=="absolute"){
                break
            }
        }
    }while(b);
return Element._returnOffset(d,a)
},
absolutize:function(b){
    b=$(b);
    if(b.getStyle("position")=="absolute"){
        return
    }
    var d=b.positionedOffset();
    var f=d[1];
    var e=d[0];
    var c=b.clientWidth;
    var a=b.clientHeight;
    b._originalLeft=e-parseFloat(b.style.left||0);
    b._originalTop=f-parseFloat(b.style.top||0);
    b._originalWidth=b.style.width;
    b._originalHeight=b.style.height;
    b.style.position="absolute";
    b.style.top=f+"px";
    b.style.left=e+"px";
    b.style.width=c+"px";
    b.style.height=a+"px";
    return b
    },
relativize:function(a){
    a=$(a);
    if(a.getStyle("position")=="relative"){
        return
    }
    a.style.position="relative";
    var c=parseFloat(a.style.top||0)-(a._originalTop||0);
    var b=parseFloat(a.style.left||0)-(a._originalLeft||0);
    a.style.top=c+"px";
    a.style.left=b+"px";
    a.style.height=a._originalHeight;
    a.style.width=a._originalWidth;
    return a
    },
cumulativeScrollOffset:function(b){
    var a=0,c=0;
    do{
        a+=b.scrollTop||0;
        c+=b.scrollLeft||0;
        b=b.parentNode
        }while(b);
    return Element._returnOffset(c,a)
    },
getOffsetParent:function(a){
    if(a.offsetParent){
        return $(a.offsetParent)
        }
        if(a==document.body){
        return $(a)
        }while((a=a.parentNode)&&a!=document.body){
        if(Element.getStyle(a,"position")!="static"){
            return $(a)
            }
        }
    return $(document.body)
},
viewportOffset:function(d){
    var a=0,c=0;
    var b=d;
    do{
        a+=b.offsetTop||0;
        c+=b.offsetLeft||0;
        if(b.offsetParent==document.body&&Element.getStyle(b,"position")=="absolute"){
            break
        }
    }while(b=b.offsetParent);
b=d;
do{
    if(!Prototype.Browser.Opera||b.tagName=="BODY"){
        a-=b.scrollTop||0;
        c-=b.scrollLeft||0
        }
    }while(b=b.parentNode);
return Element._returnOffset(c,a)
},
clonePosition:function(b,d){
    var a=Object.extend({
        setLeft:true,
        setTop:true,
        setWidth:true,
        setHeight:true,
        offsetTop:0,
        offsetLeft:0
    },arguments[2]||{});
    d=$(d);
    var e=d.viewportOffset();
    b=$(b);
    var f=[0,0];
    var c=null;
    if(Element.getStyle(b,"position")=="absolute"){
        c=b.getOffsetParent();
        f=c.viewportOffset()
        }
        if(c==document.body){
        f[0]-=document.body.offsetLeft;
        f[1]-=document.body.offsetTop
        }
        if(a.setLeft){
        b.style.left=(e[0]-f[0]+a.offsetLeft)+"px"
        }
        if(a.setTop){
        b.style.top=(e[1]-f[1]+a.offsetTop)+"px"
        }
        if(a.setWidth){
        b.style.width=d.offsetWidth+"px"
        }
        if(a.setHeight){
        b.style.height=d.offsetHeight+"px"
        }
        return b
    }
};

Element.Methods.identify.counter=1;
Object.extend(Element.Methods,{
    getElementsBySelector:Element.Methods.select,
    childElements:Element.Methods.immediateDescendants
    });
Element._attributeTranslations={
    write:{
        names:{
            className:"class",
            htmlFor:"for"
        },
        values:{}
}
};

if(!document.createRange||Prototype.Browser.Opera){
    Element.Methods.insert=function(e,g){
        e=$(e);
        if(Object.isString(g)||Object.isNumber(g)||Object.isElement(g)||(g&&(g.toElement||g.toHTML))){
            g={
                bottom:g
            }
        }
        var d=Element._insertionTranslations,f,b,h,c;
    for(b in g){
        f=g[b];
        b=b.toLowerCase();
        h=d[b];
        if(f&&f.toElement){
            f=f.toElement()
            }
            if(Object.isElement(f)){
            h.insert(e,f);
            continue
        }
        f=Object.toHTML(f);
        c=((b=="before"||b=="after")?e.parentNode:e).tagName.toUpperCase();
        if(d.tags[c]){
            var a=Element._getContentFromAnonymousElement(c,f.stripScripts());
            if(b=="top"||b=="after"){
                a.reverse()
                }
                a.each(h.insert.curry(e))
            }else{
            e.insertAdjacentHTML(h.adjacency,f.stripScripts())
            }
            f.evalScripts.bind(f).defer()
        }
        return e
    }
    }
if(Prototype.Browser.Opera){
    Element.Methods._getStyle=Element.Methods.getStyle;
    Element.Methods.getStyle=function(a,b){
        switch(b){
            case"left":case"top":case"right":case"bottom":
                if(Element._getStyle(a,"position")=="static"){
                return null
                }
                default:
                return Element._getStyle(a,b)
                }
            };
    
Element.Methods._readAttribute=Element.Methods.readAttribute;
Element.Methods.readAttribute=function(a,b){
    if(b=="title"){
        return a.title
        }
        return Element._readAttribute(a,b)
    }
}else{
    if(Prototype.Browser.IE){
        $w("positionedOffset getOffsetParent viewportOffset").each(function(a){
            Element.Methods[a]=Element.Methods[a].wrap(function(d,c){
                c=$(c);
                var b=c.getStyle("position");
                if(b!="static"){
                    return d(c)
                    }
                    c.setStyle({
                    position:"relative"
                });
                var e=d(c);
                c.setStyle({
                    position:b
                });
                return e
                })
            });
        Element.Methods.getStyle=function(a,b){
            a=$(a);
            b=(b=="float"||b=="cssFloat")?"styleFloat":b.camelize();
            var c=a.style[b];
            if(!c&&a.currentStyle){
                c=a.currentStyle[b]
                }
                if(b=="opacity"){
                if(c=(a.getStyle("filter")||"").match(/alpha\(opacity=(.*)\)/)){
                    if(c[1]){
                        return parseFloat(c[1])/100
                        }
                    }
                return 1
            }
            if(c=="auto"){
            if((b=="width"||b=="height")&&(a.getStyle("display")!="none")){
                return a["offset"+b.capitalize()]+"px"
                }
                return null
            }
            return c
        };
        
    Element.Methods.setOpacity=function(b,e){
        function f(g){
            return g.replace(/alpha\([^\)]*\)/gi,"")
            }
            b=$(b);
        var a=b.currentStyle;
        if((a&&!a.hasLayout)||(!a&&b.style.zoom=="normal")){
            b.style.zoom=1
            }
            var d=b.getStyle("filter"),c=b.style;
        if(e==1||e===""){
            (d=f(d))?c.filter=d:c.removeAttribute("filter");
            return b
            }else{
            if(e<0.00001){
                e=0
                }
            }
        c.filter=f(d)+"alpha(opacity="+(e*100)+")";
        return b
        };
        
Element._attributeTranslations={
    read:{
        names:{
            "class":"className",
            "for":"htmlFor"
        },
        values:{
            _getAttr:function(a,b){
                return a.getAttribute(b,2)
                },
            _getAttrNode:function(a,c){
                var b=a.getAttributeNode(c);
                return b?b.value:""
                },
            _getEv:function(a,b){
                var b=a.getAttribute(b);
                return b?b.toString().slice(23,-2):null
                },
            _flag:function(a,b){
                return $(a).hasAttribute(b)?b:null
                },
            style:function(a){
                return a.style.cssText.toLowerCase()
                },
            title:function(a){
                return a.title
                }
            }
    }
};

Element._attributeTranslations.write={
    names:Object.clone(Element._attributeTranslations.read.names),
    values:{
        checked:function(a,b){
            a.checked=!!b
            },
        style:function(a,b){
            a.style.cssText=b?b:""
            }
        }
};

Element._attributeTranslations.has={};
    
$w("colSpan rowSpan vAlign dateTime accessKey tabIndex encType maxLength readOnly longDesc").each(function(a){
    Element._attributeTranslations.write.names[a.toLowerCase()]=a;
    Element._attributeTranslations.has[a.toLowerCase()]=a
    });
(function(a){
    Object.extend(a,{
        href:a._getAttr,
        src:a._getAttr,
        type:a._getAttr,
        action:a._getAttrNode,
        disabled:a._flag,
        checked:a._flag,
        readonly:a._flag,
        multiple:a._flag,
        onload:a._getEv,
        onunload:a._getEv,
        onclick:a._getEv,
        ondblclick:a._getEv,
        onmousedown:a._getEv,
        onmouseup:a._getEv,
        onmouseover:a._getEv,
        onmousemove:a._getEv,
        onmouseout:a._getEv,
        onfocus:a._getEv,
        onblur:a._getEv,
        onkeypress:a._getEv,
        onkeydown:a._getEv,
        onkeyup:a._getEv,
        onsubmit:a._getEv,
        onreset:a._getEv,
        onselect:a._getEv,
        onchange:a._getEv
        })
    })(Element._attributeTranslations.read.values)
    }else{
    if(Prototype.Browser.Gecko&&/rv:1\.8\.0/.test(navigator.userAgent)){
        Element.Methods.setOpacity=function(a,b){
            a=$(a);
            a.style.opacity=(b==1)?0.999999:(b==="")?"":(b<0.00001)?0:b;
            return a
            }
        }else{
    if(Prototype.Browser.WebKit){
        Element.Methods.setOpacity=function(a,b){
            a=$(a);
            a.style.opacity=(b==1||b==="")?"":(b<0.00001)?0:b;
            if(b==1){
                if(a.tagName=="IMG"&&a.width){
                    a.width++;
                    a.width--
                }else{
                    try{
                        var d=document.createTextNode(" ");
                        a.appendChild(d);
                        a.removeChild(d)
                        }catch(c){}
                }
            }
        return a
        };
        
Element.Methods.cumulativeOffset=function(b){
    var a=0,c=0;
    do{
        a+=b.offsetTop||0;
        c+=b.offsetLeft||0;
        if(b.offsetParent==document.body){
            if(Element.getStyle(b,"position")=="absolute"){
                break
            }
        }
        b=b.offsetParent
    }while(b);
    return Element._returnOffset(c,a)
    }
}
}
}
}
if(Prototype.Browser.IE||Prototype.Browser.Opera){
    Element.Methods.update=function(b,c){
        b=$(b);
        if(c&&c.toElement){
            c=c.toElement()
            }
            if(Object.isElement(c)){
            return b.update().insert(c)
            }
            c=Object.toHTML(c);
        var a=b.tagName.toUpperCase();
        if(a in Element._insertionTranslations.tags){
            $A(b.childNodes).each(function(d){
                b.removeChild(d)
                });
            Element._getContentFromAnonymousElement(a,c.stripScripts()).each(function(d){
                b.appendChild(d)
                })
            }else{
            b.innerHTML=c.stripScripts()
            }
            c.evalScripts.bind(c).defer();
        return b
        }
    }
    if(document.createElement("div").outerHTML){
    Element.Methods.replace=function(c,e){
        c=$(c);
        if(e&&e.toElement){
            e=e.toElement()
            }
            if(Object.isElement(e)){
            c.parentNode.replaceChild(e,c);
            return c
            }
            e=Object.toHTML(e);
        var d=c.parentNode,b=d.tagName.toUpperCase();
        if(Element._insertionTranslations.tags[b]){
            var f=c.next();
            var a=Element._getContentFromAnonymousElement(b,e.stripScripts());
            d.removeChild(c);
            if(f){
                a.each(function(g){
                    d.insertBefore(g,f)
                    })
                }else{
                a.each(function(g){
                    d.appendChild(g)
                    })
                }
            }else{
        c.outerHTML=e.stripScripts()
        }
        e.evalScripts.bind(e).defer();
        return c
        }
    }
Element._returnOffset=function(b,c){
    var a=[b,c];
    a.left=b;
    a.top=c;
    return a
    };
    
Element._getContentFromAnonymousElement=function(c,b){
    var d=new Element("div"),a=Element._insertionTranslations.tags[c];
    d.innerHTML=a[0]+b+a[1];
    a[2].times(function(){
        d=d.firstChild
        });
    return $A(d.childNodes)
    };
    
Element._insertionTranslations={
    before:{
        adjacency:"beforeBegin",
        insert:function(a,b){
            a.parentNode.insertBefore(b,a)
            },
        initializeRange:function(b,a){
            a.setStartBefore(b)
            }
        },
top:{
    adjacency:"afterBegin",
    insert:function(a,b){
        a.insertBefore(b,a.firstChild)
        },
    initializeRange:function(b,a){
        a.selectNodeContents(b);
        a.collapse(true)
        }
    },
bottom:{
    adjacency:"beforeEnd",
    insert:function(a,b){
        a.appendChild(b)
        }
    },
after:{
    adjacency:"afterEnd",
    insert:function(a,b){
        a.parentNode.insertBefore(b,a.nextSibling)
        },
    initializeRange:function(b,a){
        a.setStartAfter(b)
        }
    },
tags:{
    TABLE:["<table>","</table>",1],
    TBODY:["<table><tbody>","</tbody></table>",2],
    TR:["<table><tbody><tr>","</tr></tbody></table>",3],
    TD:["<table><tbody><tr><td>","</td></tr></tbody></table>",4],
    SELECT:["<select>","</select>",1]
    }
};
(function(){
    this.bottom.initializeRange=this.top.initializeRange;
    Object.extend(this.tags,{
        THEAD:this.tags.TBODY,
        TFOOT:this.tags.TBODY,
        TH:this.tags.TD
        })
    }).call(Element._insertionTranslations);
Element.Methods.Simulated={
    hasAttribute:function(a,c){
        c=Element._attributeTranslations.has[c]||c;
        var b=$(a).getAttributeNode(c);
        return b&&b.specified
        }
    };

Element.Methods.ByTag={};
    
Object.extend(Element,Element.Methods);
if(!Prototype.BrowserFeatures.ElementExtensions&&document.createElement("div").__proto__){
    window.HTMLElement={};
        
    window.HTMLElement.prototype=document.createElement("div").__proto__;
    Prototype.BrowserFeatures.ElementExtensions=true
        }
        Element.extend=(function(){
    if(Prototype.BrowserFeatures.SpecificElementExtensions){
        return Prototype.K
        }
        var a={},b=Element.Methods.ByTag;
    var c=Object.extend(function(f){
        if(!f||f._extendedByPrototype||f.nodeType!=1||f==window){
            return f
            }
            var d=Object.clone(a),e=f.tagName,h,g;
        if(b[e]){
            Object.extend(d,b[e])
            }
            for(h in d){
            g=d[h];
            if(Object.isFunction(g)&&!(h in f)){
                f[h]=g.methodize()
                }
            }
        f._extendedByPrototype=Prototype.emptyFunction;
    return f
    },{
        refresh:function(){
            if(!Prototype.BrowserFeatures.ElementExtensions){
                Object.extend(a,Element.Methods);
                Object.extend(a,Element.Methods.Simulated)
                }
            }
    });
c.refresh();
return c
})();
Element.hasAttribute=function(a,b){
    if(a.hasAttribute){
        return a.hasAttribute(b)
        }
        return Element.Methods.Simulated.hasAttribute(a,b)
    };
    
Element.addMethods=function(c){
    var h=Prototype.BrowserFeatures,d=Element.Methods.ByTag;
    if(!c){
        Object.extend(Form,Form.Methods);
        Object.extend(Form.Element,Form.Element.Methods);
        Object.extend(Element.Methods.ByTag,{
            FORM:Object.clone(Form.Methods),
            INPUT:Object.clone(Form.Element.Methods),
            SELECT:Object.clone(Form.Element.Methods),
            TEXTAREA:Object.clone(Form.Element.Methods)
            })
        }
        if(arguments.length==2){
        var b=c;
        c=arguments[1]
        }
        if(!b){
        Object.extend(Element.Methods,c||{})
        }else{
        if(Object.isArray(b)){
            b.each(g)
            }else{
            g(b)
            }
        }
    function g(j){
    j=j.toUpperCase();
    if(!Element.Methods.ByTag[j]){
        Element.Methods.ByTag[j]={}
    }
    Object.extend(Element.Methods.ByTag[j],c)
    }
    function a(l,k,j){
    j=j||false;
    for(var n in l){
        var m=l[n];
        if(!Object.isFunction(m)){
            continue
        }
        if(!j||!(n in k)){
            k[n]=m.methodize()
            }
        }
    }
    function e(l){
    var j;
    var k={
        OPTGROUP:"OptGroup",
        TEXTAREA:"TextArea",
        P:"Paragraph",
        FIELDSET:"FieldSet",
        UL:"UList",
        OL:"OList",
        DL:"DList",
        DIR:"Directory",
        H1:"Heading",
        H2:"Heading",
        H3:"Heading",
        H4:"Heading",
        H5:"Heading",
        H6:"Heading",
        Q:"Quote",
        INS:"Mod",
        DEL:"Mod",
        A:"Anchor",
        IMG:"Image",
        CAPTION:"TableCaption",
        COL:"TableCol",
        COLGROUP:"TableCol",
        THEAD:"TableSection",
        TFOOT:"TableSection",
        TBODY:"TableSection",
        TR:"TableRow",
        TH:"TableCell",
        TD:"TableCell",
        FRAMESET:"FrameSet",
        IFRAME:"IFrame"
    };
    
    if(k[l]){
        j="HTML"+k[l]+"Element"
        }
        if(window[j]){
        return window[j]
        }
        j="HTML"+l+"Element";
    if(window[j]){
        return window[j]
        }
        j="HTML"+l.capitalize()+"Element";
    if(window[j]){
        return window[j]
        }
        window[j]={};
    
    window[j].prototype=document.createElement(l).__proto__;
    return window[j]
    }
    if(h.ElementExtensions){
    a(Element.Methods,HTMLElement.prototype);
    a(Element.Methods.Simulated,HTMLElement.prototype,true)
    }
    if(h.SpecificElementExtensions){
    for(var i in Element.Methods.ByTag){
        var f=e(i);
        if(Object.isUndefined(f)){
            continue
        }
        a(d[i],f.prototype)
        }
    }
    Object.extend(Element,Element.Methods);
delete Element.ByTag;
if(Element.extend.refresh){
    Element.extend.refresh()
    }
    Element.cache={}
};

document.viewport={
    getDimensions:function(){
        var a={};
        
        $w("width height").each(function(c){
            var b=c.capitalize();
            a[c]=self["inner"+b]||(document.documentElement["client"+b]||document.body["client"+b])
            });
        return a
        },
    getWidth:function(){
        return this.getDimensions().width
        },
    getHeight:function(){
        return this.getDimensions().height
        },
    getScrollOffsets:function(){
        return Element._returnOffset(window.pageXOffset||document.documentElement.scrollLeft||document.body.scrollLeft,window.pageYOffset||document.documentElement.scrollTop||document.body.scrollTop)
        }
    };

var Selector=Class.create({
    initialize:function(a){
        this.expression=a.strip();
        this.compileMatcher()
        },
    compileMatcher:function(){
        if(Prototype.BrowserFeatures.XPath&&!(/(\[[\w-]*?:|:checked)/).test(this.expression)){
            return this.compileXPathMatcher()
            }
            var e=this.expression,ps=Selector.patterns,h=Selector.handlers,c=Selector.criteria,le,p,m;
        if(Selector._cache[e]){
            this.matcher=Selector._cache[e];
            return
        }
        this.matcher=["this.matcher = function(root) {","var r = root, h = Selector.handlers, c = false, n;"];
        while(e&&le!=e&&(/\S/).test(e)){
            le=e;
            for(var i in ps){
                p=ps[i];
                if(m=e.match(p)){
                    this.matcher.push(Object.isFunction(c[i])?c[i](m):new Template(c[i]).evaluate(m));
                    e=e.replace(m[0],"");
                    break
                }
            }
            }
            this.matcher.push("return h.unique(n);\n}");
    eval(this.matcher.join("\n"));
    Selector._cache[this.expression]=this.matcher
    },
compileXPathMatcher:function(){
    var f=this.expression,g=Selector.patterns,b=Selector.xpath,d,a;
    if(Selector._cache[f]){
        this.xpath=Selector._cache[f];
        return
    }
    this.matcher=[".//*"];
    while(f&&d!=f&&(/\S/).test(f)){
        d=f;
        for(var c in g){
            if(a=f.match(g[c])){
                this.matcher.push(Object.isFunction(b[c])?b[c](a):new Template(b[c]).evaluate(a));
                f=f.replace(a[0],"");
                break
            }
        }
        }
        this.xpath=this.matcher.join("");
Selector._cache[this.expression]=this.xpath
},
findElements:function(a){
    a=a||document;
    if(this.xpath){
        return document._getElementsByXPath(this.xpath,a)
        }
        return this.matcher(a)
    },
match:function(j){
    this.tokens=[];
    var o=this.expression,a=Selector.patterns,f=Selector.assertions;
    var b,d,g;
    while(o&&b!==o&&(/\S/).test(o)){
        b=o;
        for(var k in a){
            d=a[k];
            if(g=o.match(d)){
                if(f[k]){
                    this.tokens.push([k,Object.clone(g)]);
                    o=o.replace(g[0],"")
                    }else{
                    return this.findElements(document).include(j)
                    }
                }
        }
        }
    var n=true,c,l;
for(var k=0,h;h=this.tokens[k];k++){
    c=h[0],l=h[1];
    if(!Selector.assertions[c](j,l)){
        n=false;
        break
    }
}
return n
},
toString:function(){
    return this.expression
    },
inspect:function(){
    return"#<Selector:"+this.expression.inspect()+">"
    }
});
Object.extend(Selector,{
    _cache:{},
    xpath:{
        descendant:"//*",
        child:"/*",
        adjacent:"/following-sibling::*[1]",
        laterSibling:"/following-sibling::*",
        tagName:function(a){
            if(a[1]=="*"){
                return""
                }
                return"[local-name()='"+a[1].toLowerCase()+"' or local-name()='"+a[1].toUpperCase()+"']"
            },
        className:"[contains(concat(' ', @class, ' '), ' #{1} ')]",
        id:"[@id='#{1}']",
        attrPresence:"[@#{1}]",
        attr:function(a){
            a[3]=a[5]||a[6];
            return new Template(Selector.xpath.operators[a[2]]).evaluate(a)
            },
        pseudo:function(a){
            var b=Selector.xpath.pseudos[a[1]];
            if(!b){
                return""
                }
                if(Object.isFunction(b)){
                return b(a)
                }
                return new Template(Selector.xpath.pseudos[a[1]]).evaluate(a)
            },
        operators:{
            "=":"[@#{1}='#{3}']",
            "!=":"[@#{1}!='#{3}']",
            "^=":"[starts-with(@#{1}, '#{3}')]",
            "$=":"[substring(@#{1}, (string-length(@#{1}) - string-length('#{3}') + 1))='#{3}']",
            "*=":"[contains(@#{1}, '#{3}')]",
            "~=":"[contains(concat(' ', @#{1}, ' '), ' #{3} ')]",
            "|=":"[contains(concat('-', @#{1}, '-'), '-#{3}-')]"
        },
        pseudos:{
            "first-child":"[not(preceding-sibling::*)]",
            "last-child":"[not(following-sibling::*)]",
            "only-child":"[not(preceding-sibling::* or following-sibling::*)]",
            empty:"[count(*) = 0 and (count(text()) = 0 or translate(text(), ' \t\r\n', '') = '')]",
            checked:"[@checked]",
            disabled:"[@disabled]",
            enabled:"[not(@disabled)]",
            not:function(b){
                var j=b[6],h=Selector.patterns,a=Selector.xpath,f,b,c;
                var g=[];
                while(j&&f!=j&&(/\S/).test(j)){
                    f=j;
                    for(var d in h){
                        if(b=j.match(h[d])){
                            c=Object.isFunction(a[d])?a[d](b):new Template(a[d]).evaluate(b);
                            g.push("("+c.substring(1,c.length-1)+")");
                            j=j.replace(b[0],"");
                            break
                        }
                    }
                    }
                    return"[not("+g.join(" and ")+")]"
        },
    "nth-child":function(a){
        return Selector.xpath.pseudos.nth("(count(./preceding-sibling::*) + 1) ",a)
        },
    "nth-last-child":function(a){
        return Selector.xpath.pseudos.nth("(count(./following-sibling::*) + 1) ",a)
        },
    "nth-of-type":function(a){
        return Selector.xpath.pseudos.nth("position() ",a)
        },
    "nth-last-of-type":function(a){
        return Selector.xpath.pseudos.nth("(last() + 1 - position()) ",a)
        },
    "first-of-type":function(a){
        a[6]="1";
        return Selector.xpath.pseudos["nth-of-type"](a)
        },
    "last-of-type":function(a){
        a[6]="1";
        return Selector.xpath.pseudos["nth-last-of-type"](a)
        },
    "only-of-type":function(a){
        var b=Selector.xpath.pseudos;
        return b["first-of-type"](a)+b["last-of-type"](a)
        },
    nth:function(g,e){
        var h,i=e[6],d;
        if(i=="even"){
            i="2n+0"
            }
            if(i=="odd"){
            i="2n+1"
            }
            if(h=i.match(/^(\d+)$/)){
            return"["+g+"= "+h[1]+"]"
            }
            if(h=i.match(/^(-?\d*)?n(([+-])(\d+))?/)){
            if(h[1]=="-"){
                h[1]=-1
                }
                var f=h[1]?Number(h[1]):1;
            var c=h[2]?Number(h[2]):0;
            d="[((#{fragment} - #{b}) mod #{a} = 0) and ((#{fragment} - #{b}) div #{a} >= 0)]";
            return new Template(d).evaluate({
                fragment:g,
                a:f,
                b:c
            })
            }
        }
}
},
criteria:{
    tagName:'n = h.tagName(n, r, "#{1}", c);   c = false;',
    className:'n = h.className(n, r, "#{1}", c); c = false;',
    id:'n = h.id(n, r, "#{1}", c);        c = false;',
    attrPresence:'n = h.attrPresence(n, r, "#{1}"); c = false;',
    attr:function(a){
        a[3]=(a[5]||a[6]);
        return new Template('n = h.attr(n, r, "#{1}", "#{3}", "#{2}"); c = false;').evaluate(a)
        },
    pseudo:function(a){
        if(a[6]){
            a[6]=a[6].replace(/"/g,'\\"')
            }
            return new Template('n = h.pseudo(n, "#{1}", "#{6}", r, c); c = false;').evaluate(a)
        },
    descendant:'c = "descendant";',
    child:'c = "child";',
    adjacent:'c = "adjacent";',
    laterSibling:'c = "laterSibling";'
},
patterns:{
    laterSibling:/^\s*~\s*/,
    child:/^\s*>\s*/,
    adjacent:/^\s*\+\s*/,
    descendant:/^\s/,
    tagName:/^\s*(\*|[\w\-]+)(\b|$)?/,
    id:/^#([\w\-\*]+)(\b|$)/,
    className:/^\.([\w\-\*]+)(\b|$)/,
    pseudo:/^:((first|last|nth|nth-last|only)(-child|-of-type)|empty|checked|(en|dis)abled|not)(\((.*?)\))?(\b|$|(?=\s)|(?=:))/,
    attrPresence:/^\[([\w]+)\]/,
    attr:/\[((?:[\w-]*:)?[\w-]+)\s*(?:([!^$*~|]?=)\s*((['"])([^\4]*?)\4|([^'"][^\]]*?)))?\]/
},
assertions:{
    tagName:function(a,b){
        return b[1].toUpperCase()==a.tagName.toUpperCase()
        },
    className:function(a,b){
        return Element.hasClassName(a,b[1])
        },
    id:function(a,b){
        return a.id===b[1]
        },
    attrPresence:function(a,b){
        return Element.hasAttribute(a,b[1])
        },
    attr:function(b,c){
        var a=Element.readAttribute(b,c[1]);
        return Selector.operators[c[2]](a,c[3])
        }
    },
handlers:{
    concat:function(d,c){
        for(var e=0,f;f=c[e];e++){
            d.push(f)
            }
            return d
        },
    mark:function(a){
        for(var b=0,c;c=a[b];b++){
            c._counted=true
            }
            return a
        },
    unmark:function(a){
        for(var b=0,c;c=a[b];b++){
            c._counted=undefined
            }
            return a
        },
    index:function(a,d,g){
        a._counted=true;
        if(d){
            for(var b=a.childNodes,e=b.length-1,c=1;e>=0;e--){
                var f=b[e];
                if(f.nodeType==1&&(!g||f._counted)){
                    f.nodeIndex=c++
                }
            }
            }else{
    for(var e=0,c=1,b=a.childNodes;f=b[e];e++){
        if(f.nodeType==1&&(!g||f._counted)){
            f.nodeIndex=c++
        }
    }
    }
},
unique:function(b){
    if(b.length==0){
        return b
        }
        var d=[],e;
    for(var c=0,a=b.length;c<a;c++){
        if(!(e=b[c])._counted){
            e._counted=true;
            d.push(Element.extend(e))
            }
        }
    return Selector.handlers.unmark(d)
},
descendant:function(a){
    var d=Selector.handlers;
    for(var c=0,b=[],e;e=a[c];c++){
        d.concat(b,e.getElementsByTagName("*"))
        }
        return b
    },
child:function(a){
    var f=Selector.handlers;
    for(var e=0,d=[],g;g=a[e];e++){
        for(var b=0,c=[],k;k=g.childNodes[b];b++){
            if(k.nodeType==1&&k.tagName!="!"){
                d.push(k)
                }
            }
        }
    return d
},
adjacent:function(a){
    for(var c=0,b=[],e;e=a[c];c++){
        var d=this.nextElementSibling(e);
        if(d){
            b.push(d)
            }
        }
    return b
},
laterSibling:function(a){
    var d=Selector.handlers;
    for(var c=0,b=[],e;e=a[c];c++){
        d.concat(b,Element.nextSiblings(e))
        }
        return b
    },
nextElementSibling:function(a){
    while(a=a.nextSibling){
        if(a.nodeType==1){
            return a
            }
        }
    return null
},
previousElementSibling:function(a){
    while(a=a.previousSibling){
        if(a.nodeType==1){
            return a
            }
        }
    return null
},
tagName:function(b,a,e,j){
    e=e.toUpperCase();
    var d=[],f=Selector.handlers;
    if(b){
        if(j){
            if(j=="descendant"){
                for(var c=0,g;g=b[c];c++){
                    f.concat(d,g.getElementsByTagName(e))
                    }
                    return d
                }else{
                b=this[j](b)
                }
                if(e=="*"){
                return b
                }
            }
        for(var c=0,g;g=b[c];c++){
        if(g.tagName.toUpperCase()==e){
            d.push(g)
            }
        }
    return d
}else{
    return a.getElementsByTagName(e)
    }
},
id:function(b,a,j,f){
    var g=$(j),d=Selector.handlers;
    if(!g){
        return[]
        }
        if(!b&&a==document){
        return[g]
        }
        if(b){
        if(f){
            if(f=="child"){
                for(var c=0,e;e=b[c];c++){
                    if(g.parentNode==e){
                        return[g]
                        }
                    }
                }else{
        if(f=="descendant"){
            for(var c=0,e;e=b[c];c++){
                if(Element.descendantOf(g,e)){
                    return[g]
                    }
                }
            }else{
    if(f=="adjacent"){
        for(var c=0,e;e=b[c];c++){
            if(Selector.handlers.previousElementSibling(g)==e){
                return[g]
                }
            }
        }else{
    b=d[f](b)
    }
}
}
}
for(var c=0,e;e=b[c];c++){
    if(e==g){
        return[g]
        }
    }
return[]
}
return(g&&Element.descendantOf(g,a))?[g]:[]
},
className:function(b,a,c,d){
    if(b&&d){
        b=this[d](b)
        }
        return Selector.handlers.byClassName(b,a,c)
    },
byClassName:function(c,b,f){
    if(!c){
        c=Selector.handlers.descendant([b])
        }
        var h=" "+f+" ";
    for(var e=0,d=[],g,a;g=c[e];e++){
        a=g.className;
        if(a.length==0){
            continue
        }
        if(a==f||(" "+a+" ").include(h)){
            d.push(g)
            }
        }
    return d
},
attrPresence:function(c,b,a){
    if(!c){
        c=b.getElementsByTagName("*")
        }
        var e=[];
    for(var d=0,f;f=c[d];d++){
        if(Element.hasAttribute(f,a)){
            e.push(f)
            }
        }
    return e
},
attr:function(a,h,g,j,b){
    if(!a){
        a=h.getElementsByTagName("*")
        }
        var k=Selector.operators[b],d=[];
    for(var e=0,c;c=a[e];e++){
        var f=Element.readAttribute(c,g);
        if(f===null){
            continue
        }
        if(k(f,j)){
            d.push(c)
            }
        }
    return d
},
pseudo:function(b,c,e,a,d){
    if(b&&d){
        b=this[d](b)
        }
        if(!b){
        b=a.getElementsByTagName("*")
        }
        return Selector.pseudos[c](b,e,a)
    }
},
pseudos:{
    "first-child":function(b,f,a){
        for(var d=0,c=[],e;e=b[d];d++){
            if(Selector.handlers.previousElementSibling(e)){
                continue
            }
            c.push(e)
            }
            return c
        },
    "last-child":function(b,f,a){
        for(var d=0,c=[],e;e=b[d];d++){
            if(Selector.handlers.nextElementSibling(e)){
                continue
            }
            c.push(e)
            }
            return c
        },
    "only-child":function(b,g,a){
        var e=Selector.handlers;
        for(var d=0,c=[],f;f=b[d];d++){
            if(!e.previousElementSibling(f)&&!e.nextElementSibling(f)){
                c.push(f)
                }
            }
        return c
    },
"nth-child":function(b,c,a){
    return Selector.pseudos.nth(b,c,a)
    },
"nth-last-child":function(b,c,a){
    return Selector.pseudos.nth(b,c,a,true)
    },
"nth-of-type":function(b,c,a){
    return Selector.pseudos.nth(b,c,a,false,true)
    },
"nth-last-of-type":function(b,c,a){
    return Selector.pseudos.nth(b,c,a,true,true)
    },
"first-of-type":function(b,c,a){
    return Selector.pseudos.nth(b,"1",a,false,true)
    },
"last-of-type":function(b,c,a){
    return Selector.pseudos.nth(b,"1",a,true,true)
    },
"only-of-type":function(b,d,a){
    var c=Selector.pseudos;
    return c["last-of-type"](c["first-of-type"](b,d,a),d,a)
    },
getIndices:function(d,c,e){
    if(d==0){
        return c>0?[c]:[]
        }
        return $R(1,e).inject([],function(a,b){
        if(0==(b-c)%d&&(b-c)/d>=0){
            a.push(b)
            }
            return a
        })
    },
nth:function(c,s,u,r,e){
    if(c.length==0){
        return[]
        }
        if(s=="even"){
        s="2n+0"
        }
        if(s=="odd"){
        s="2n+1"
        }
        var q=Selector.handlers,p=[],d=[],g;
    q.mark(c);
    for(var o=0,f;f=c[o];o++){
        if(!f.parentNode._counted){
            q.index(f.parentNode,r,e);
            d.push(f.parentNode)
            }
        }
    if(s.match(/^\d+$/)){
    s=Number(s);
    for(var o=0,f;f=c[o];o++){
        if(f.nodeIndex==s){
            p.push(f)
            }
        }
    }else{
    if(g=s.match(/^(-?\d*)?n(([+-])(\d+))?/)){
        if(g[1]=="-"){
            g[1]=-1
            }
            var v=g[1]?Number(g[1]):1;
        var t=g[2]?Number(g[2]):0;
        var w=Selector.pseudos.getIndices(v,t,c.length);
        for(var o=0,f,k=w.length;f=c[o];o++){
            for(var n=0;n<k;n++){
                if(f.nodeIndex==w[n]){
                    p.push(f)
                    }
                }
            }
        }
}
q.unmark(c);
q.unmark(d);
return p
},
empty:function(b,f,a){
    for(var d=0,c=[],e;e=b[d];d++){
        if(e.tagName=="!"||(e.firstChild&&!e.innerHTML.match(/^\s*$/))){
            continue
        }
        c.push(e)
        }
        return c
    },
not:function(a,d,k){
    var g=Selector.handlers,l,c;
    var j=new Selector(d).findElements(k);
    g.mark(j);
    for(var f=0,e=[],b;b=a[f];f++){
        if(!b._counted){
            e.push(b)
            }
        }
    g.unmark(j);
return e
},
enabled:function(b,f,a){
    for(var d=0,c=[],e;e=b[d];d++){
        if(!e.disabled){
            c.push(e)
            }
        }
    return c
},
disabled:function(b,f,a){
    for(var d=0,c=[],e;e=b[d];d++){
        if(e.disabled){
            c.push(e)
            }
        }
    return c
},
checked:function(b,f,a){
    for(var d=0,c=[],e;e=b[d];d++){
        if(e.checked){
            c.push(e)
            }
        }
    return c
}
},
operators:{
    "=":function(b,a){
        return b==a
        },
    "!=":function(b,a){
        return b!=a
        },
    "^=":function(b,a){
        return b.startsWith(a)
        },
    "$=":function(b,a){
        return b.endsWith(a)
        },
    "*=":function(b,a){
        return b.include(a)
        },
    "~=":function(b,a){
        return(" "+b+" ").include(" "+a+" ")
        },
    "|=":function(b,a){
        return("-"+b.toUpperCase()+"-").include("-"+a.toUpperCase()+"-")
        }
    },
matchElements:function(f,g){
    var e=new Selector(g).findElements(),d=Selector.handlers;
    d.mark(e);
    for(var c=0,b=[],a;a=f[c];c++){
        if(a._counted){
            b.push(a)
            }
        }
    d.unmark(e);
return b
},
findElement:function(b,c,a){
    if(Object.isNumber(c)){
        a=c;
        c=false
        }
        return Selector.matchElements(b,c||"*")[a||0]
    },
findChildElements:function(e,g){
    var j=g.join(","),g=[];
    j.scan(/(([\w#:.~>+()\s-]+|\*|\[.*?\])+)\s*(,|$)/,function(h){
        g.push(h[1].strip())
        });
    var d=[],f=Selector.handlers;
    for(var c=0,b=g.length,a;c<b;c++){
        a=new Selector(g[c].strip());
        f.concat(d,a.findElements(e))
        }
        return(b>1)?f.unique(d):d
    }
});
function $$(){
    return Selector.findChildElements(document,$A(arguments))
    }
    var Form={
    reset:function(a){
        $(a).reset();
        return a
        },
    serializeElements:function(g,b){
        if(typeof b!="object"){
            b={
                hash:!!b
                }
            }else{
        if(b.hash===undefined){
            b.hash=true
            }
        }
    var c,f,a=false,e=b.submit;
var d=g.inject({},function(h,i){
    if(!i.disabled&&i.name){
        c=i.name;
        f=$(i).getValue();
        if(f!=null&&(i.type!="submit"||(!a&&e!==false&&(!e||c==e)&&(a=true)))){
            if(c in h){
                if(!Object.isArray(h[c])){
                    h[c]=[h[c]]
                    }
                    h[c].push(f)
                }else{
                h[c]=f
                }
            }
    }
return h
});
return b.hash?d:Object.toQueryString(d)
}
};

Form.Methods={
    serialize:function(b,a){
        return Form.serializeElements(Form.getElements(b),a)
        },
    getElements:function(a){
        return $A($(a).getElementsByTagName("*")).inject([],function(b,c){
            if(Form.Element.Serializers[c.tagName.toLowerCase()]){
                b.push(Element.extend(c))
                }
                return b
            })
        },
    getInputs:function(g,c,d){
        g=$(g);
        var a=g.getElementsByTagName("input");
        if(!c&&!d){
            return $A(a).map(Element.extend)
            }
            for(var e=0,h=[],f=a.length;e<f;e++){
            var b=a[e];
            if((c&&b.type!=c)||(d&&b.name!=d)){
                continue
            }
            h.push(Element.extend(b))
            }
            return h
        },
    disable:function(a){
        a=$(a);
        Form.getElements(a).invoke("disable");
        return a
        },
    enable:function(a){
        a=$(a);
        Form.getElements(a).invoke("enable");
        return a
        },
    findFirstElement:function(b){
        var c=$(b).getElements().findAll(function(d){
            return"hidden"!=d.type&&!d.disabled
            });
        var a=c.findAll(function(d){
            return d.hasAttribute("tabIndex")&&d.tabIndex>=0
            }).sortBy(function(d){
            return d.tabIndex
            }).first();
        return a?a:c.find(function(d){
            return["input","select","textarea"].include(d.tagName.toLowerCase())
            })
        },
    focusFirstElement:function(a){
        a=$(a);
        a.findFirstElement().activate();
        return a
        },
    request:function(b,a){
        b=$(b),a=Object.clone(a||{});
        var d=a.parameters,c=b.readAttribute("action")||"";
        if(c.blank()){
            c=window.location.href
            }
            a.parameters=b.serialize(true);
        if(d){
            if(Object.isString(d)){
                d=d.toQueryParams()
                }
                Object.extend(a.parameters,d)
            }
            if(b.hasAttribute("method")&&!a.method){
            a.method=b.method
            }
            return new Ajax.Request(c,a)
        }
    };

Form.Element={
    focus:function(a){
        $(a).focus();
        return a
        },
    select:function(a){
        $(a).select();
        return a
        }
    };

Form.Element.Methods={
    serialize:function(a){
        a=$(a);
        if(!a.disabled&&a.name){
            var b=a.getValue();
            if(b!=undefined){
                var c={};
                
                c[a.name]=b;
                return Object.toQueryString(c)
                }
            }
        return""
    },
getValue:function(a){
    a=$(a);
    var b=a.tagName.toLowerCase();
    return Form.Element.Serializers[b](a)
    },
setValue:function(a,b){
    a=$(a);
    var c=a.tagName.toLowerCase();
    Form.Element.Serializers[c](a,b);
    return a
    },
clear:function(a){
    $(a).value="";
    return a
    },
present:function(a){
    return $(a).value!=""
    },
activate:function(a){
    a=$(a);
    try{
        a.focus();
        if(a.select&&(a.tagName.toLowerCase()!="input"||!["button","reset","submit"].include(a.type))){
            a.select()
            }
        }catch(b){}
    return a
    },
disable:function(a){
    a=$(a);
    a.blur();
    a.disabled=true;
    return a
    },
enable:function(a){
    a=$(a);
    a.disabled=false;
    return a
    }
};

var Field=Form.Element;
var $F=Form.Element.Methods.getValue;
Form.Element.Serializers={
    input:function(a,b){
        switch(a.type.toLowerCase()){
            case"checkbox":case"radio":
                return Form.Element.Serializers.inputSelector(a,b);
            default:
                return Form.Element.Serializers.textarea(a,b)
                }
            },
inputSelector:function(a,b){
    if(b===undefined){
        return a.checked?a.value:null
        }else{
        a.checked=!!b
        }
    },
textarea:function(a,b){
    if(b===undefined){
        return a.value
        }else{
        a.value=b
        }
    },
select:function(d,a){
    if(a===undefined){
        return this[d.type=="select-one"?"selectOne":"selectMany"](d)
        }else{
        var c,f,g=!Object.isArray(a);
        for(var b=0,e=d.length;b<e;b++){
            c=d.options[b];
            f=this.optionValue(c);
            if(g){
                if(f==a){
                    c.selected=true;
                    return
                }
            }else{
            c.selected=a.include(f)
            }
        }
    }
},
selectOne:function(b){
    var a=b.selectedIndex;
    return a>=0?this.optionValue(b.options[a]):null
    },
selectMany:function(d){
    var a,e=d.length;
    if(!e){
        return null
        }
        for(var c=0,a=[];c<e;c++){
        var b=d.options[c];
        if(b.selected){
            a.push(this.optionValue(b))
            }
        }
    return a
},
optionValue:function(a){
    return Element.extend(a).hasAttribute("value")?a.value:a.text
    }
};

Abstract.TimedObserver=Class.create(PeriodicalExecuter,{
    initialize:function($super,a,b,c){
        $super(c,b);
        this.element=$(a);
        this.lastValue=this.getValue()
        },
    execute:function(){
        var a=this.getValue();
        if(Object.isString(this.lastValue)&&Object.isString(a)?this.lastValue!=a:String(this.lastValue)!=String(a)){
            this.callback(this.element,a);
            this.lastValue=a
            }
        }
});
Form.Element.Observer=Class.create(Abstract.TimedObserver,{
    getValue:function(){
        return Form.Element.getValue(this.element)
        }
    });
Form.Observer=Class.create(Abstract.TimedObserver,{
    getValue:function(){
        return Form.serialize(this.element)
        }
    });
Abstract.EventObserver=Class.create({
    initialize:function(a,b){
        this.element=$(a);
        this.callback=b;
        this.lastValue=this.getValue();
        if(this.element.tagName.toLowerCase()=="form"){
            this.registerFormCallbacks()
            }else{
            this.registerCallback(this.element)
            }
        },
onElementEvent:function(){
    var a=this.getValue();
    if(this.lastValue!=a){
        this.callback(this.element,a);
        this.lastValue=a
        }
    },
registerFormCallbacks:function(){
    Form.getElements(this.element).each(this.registerCallback,this)
    },
registerCallback:function(a){
    if(a.type){
        switch(a.type.toLowerCase()){
            case"checkbox":case"radio":
                Event.observe(a,"click",this.onElementEvent.bind(this));
                break;
            default:
                Event.observe(a,"change",this.onElementEvent.bind(this));
                break
                }
            }
}
});
Form.Element.EventObserver=Class.create(Abstract.EventObserver,{
    getValue:function(){
        return Form.Element.getValue(this.element)
        }
    });
Form.EventObserver=Class.create(Abstract.EventObserver,{
    getValue:function(){
        return Form.serialize(this.element)
        }
    });
if(!window.Event){
    var Event={}
}
Object.extend(Event,{
    KEY_BACKSPACE:8,
    KEY_TAB:9,
    KEY_RETURN:13,
    KEY_ESC:27,
    KEY_LEFT:37,
    KEY_UP:38,
    KEY_RIGHT:39,
    KEY_DOWN:40,
    KEY_DELETE:46,
    KEY_HOME:36,
    KEY_END:35,
    KEY_PAGEUP:33,
    KEY_PAGEDOWN:34,
    KEY_INSERT:45,
    cache:{},
    relatedTarget:function(b){
        var a;
        switch(b.type){
            case"mouseover":
                a=b.fromElement;
                break;
            case"mouseout":
                a=b.toElement;
                break;
            default:
                return null
                }
                return Element.extend(a)
        }
    });
Event.Methods=(function(){
    var a;
    if(Prototype.Browser.IE){
        var b={
            0:1,
            1:4,
            2:2
        };
        
        a=function(d,c){
            return d.button==b[c]
            }
        }else{
    if(Prototype.Browser.WebKit){
        a=function(d,c){
            switch(c){
                case 0:
                    return d.which==1&&!d.metaKey;
                case 1:
                    return d.which==1&&d.metaKey;
                default:
                    return false
                    }
                }
    }else{
    a=function(d,c){
        return d.which?(d.which===c+1):(d.button===c)
        }
    }
}
return{
    isLeftClick:function(c){
        return a(c,0)
        },
    isMiddleClick:function(c){
        return a(c,1)
        },
    isRightClick:function(c){
        return a(c,2)
        },
    element:function(d){
        var c=Event.extend(d).target;
        return Element.extend(c.nodeType==Node.TEXT_NODE?c.parentNode:c)
        },
    findElement:function(d,e){
        var c=Event.element(d);
        return c.match(e)?c:c.up(e)
        },
    pointer:function(c){
        return{
            x:c.pageX||(c.clientX+(document.documentElement.scrollLeft||document.body.scrollLeft)),
            y:c.pageY||(c.clientY+(document.documentElement.scrollTop||document.body.scrollTop))
            }
        },
pointerX:function(c){
    return Event.pointer(c).x
    },
pointerY:function(c){
    return Event.pointer(c).y
    },
stop:function(c){
    Event.extend(c);
    c.preventDefault();
    c.stopPropagation();
    c.stopped=true
    }
}
})();
Event.extend=(function(){
    var a=Object.keys(Event.Methods).inject({},function(b,c){
        b[c]=Event.Methods[c].methodize();
        return b
        });
    if(Prototype.Browser.IE){
        Object.extend(a,{
            stopPropagation:function(){
                this.cancelBubble=true
                },
            preventDefault:function(){
                this.returnValue=false
                },
            inspect:function(){
                return"[object Event]"
                }
            });
    return function(b){
        if(!b){
            return false
            }
            if(b._extendedByPrototype){
            return b
            }
            b._extendedByPrototype=Prototype.emptyFunction;
        var c=Event.pointer(b);
        Object.extend(b,{
            target:b.srcElement,
            relatedTarget:Event.relatedTarget(b),
            pageX:c.x,
            pageY:c.y
            });
        return Object.extend(b,a)
        }
    }else{
    Event.prototype=Event.prototype||document.createEvent("HTMLEvents").__proto__;
    Object.extend(Event.prototype,a);
    return Prototype.K
    }
})();
Object.extend(Event,(function(){
    var b=Event.cache;
    function c(j){
        if(j._eventID){
            return j._eventID
            }
            arguments.callee.id=arguments.callee.id||1;
        return j._eventID=++arguments.callee.id
        }
        function g(j){
        if(j&&j.include(":")){
            return"dataavailable"
            }
            return j
        }
        function a(j){
        return b[j]=b[j]||{}
    }
    function f(l,j){
    var k=a(l);
    return k[j]=k[j]||[]
    }
    function h(k,j,l){
    var o=c(k);
    var n=f(o,j);
    if(n.pluck("handler").include(l)){
        return false
        }
        var m=function(p){
        if(!Event||!Event.extend||(p.eventName&&p.eventName!=j)){
            return false
            }
            Event.extend(p);
        l.call(k,p)
        };
        
    m.handler=l;
    n.push(m);
    return m
    }
    function i(m,j,k){
    var l=f(m,j);
    return l.find(function(n){
        return n.handler==k
        })
    }
    function d(m,j,k){
    var l=a(m);
    if(!l[j]){
        return false
        }
        l[j]=l[j].without(i(m,j,k))
    }
    function e(){
    for(var k in b){
        for(var j in b[k]){
            b[k][j]=null
            }
        }
        }
    if(window.attachEvent){
    window.attachEvent("onunload",e)
    }
    return{
    observe:function(l,j,m){
        l=$(l);
        var k=g(j);
        var n=h(l,j,m);
        if(!n){
            return l
            }
            if(l.addEventListener){
            l.addEventListener(k,n,false)
            }else{
            l.attachEvent("on"+k,n)
            }
            return l
        },
    stopObserving:function(l,j,m){
        l=$(l);
        var o=c(l),k=g(j);
        if(!m&&j){
            f(o,j).each(function(p){
                l.stopObserving(j,p.handler)
                });
            return l
            }else{
            if(!j){
                Object.keys(a(o)).each(function(p){
                    l.stopObserving(p)
                    });
                return l
                }
            }
        var n=i(o,j,m);
    if(!n){
        return l
        }
        if(l.removeEventListener){
        l.removeEventListener(k,n,false)
        }else{
        l.detachEvent("on"+k,n)
        }
        d(o,j,m);
    return l
    },
fire:function(l,k,j){
    l=$(l);
    if(l==document&&document.createEvent&&!l.dispatchEvent){
        l=document.documentElement
        }
        if(document.createEvent){
        var m=document.createEvent("HTMLEvents");
        m.initEvent("dataavailable",true,true)
        }else{
        var m=document.createEventObject();
        m.eventType="ondataavailable"
        }
        m.eventName=k;
    m.memo=j||{};
    
    if(document.createEvent){
        l.dispatchEvent(m)
        }else{
        l.fireEvent(m.eventType,m)
        }
        return m
    }
}
})());
Object.extend(Event,Event.Methods);
Element.addMethods({
    fire:Event.fire,
    observe:Event.observe,
    stopObserving:Event.stopObserving
    });
Object.extend(document,{
    fire:Element.Methods.fire.methodize(),
    observe:Element.Methods.observe.methodize(),
    stopObserving:Element.Methods.stopObserving.methodize()
    });
(function(){
    var c,b=false;
    function a(){
        if(b){
            return
        }
        if(c){
            window.clearInterval(c)
            }
            document.fire("dom:loaded");
        b=true
        }
        if(document.addEventListener){
        if(Prototype.Browser.WebKit){
            c=window.setInterval(function(){
                if(/loaded|complete/.test(document.readyState)){
                    a()
                    }
                },0);
        Event.observe(window,"load",a)
        }else{
        document.addEventListener("DOMContentLoaded",a,false)
        }
    }else{
    document.write("<script id=__onDOMContentLoaded defer src=//:><\/script>");
    $("__onDOMContentLoaded").onreadystatechange=function(){
        if(this.readyState=="complete"){
            this.onreadystatechange=null;
            a()
            }
        }
}
})();
Hash.toQueryString=Object.toQueryString;
var Toggle={
    display:Element.toggle
    };
    
Element.Methods.childOf=Element.Methods.descendantOf;
var Insertion={
    Before:function(a,b){
        return Element.insert(a,{
            before:b
        })
        },
    Top:function(a,b){
        return Element.insert(a,{
            top:b
        })
        },
    Bottom:function(a,b){
        return Element.insert(a,{
            bottom:b
        })
        },
    After:function(a,b){
        return Element.insert(a,{
            after:b
        })
        }
    };

var $continue=new Error('"throw $continue" is deprecated, use "return" instead');
var Position={
    includeScrollOffsets:false,
    prepare:function(){
        this.deltaX=window.pageXOffset||document.documentElement.scrollLeft||document.body.scrollLeft||0;
        this.deltaY=window.pageYOffset||document.documentElement.scrollTop||document.body.scrollTop||0
        },
    within:function(b,a,c){
        if(this.includeScrollOffsets){
            return this.withinIncludingScrolloffsets(b,a,c)
            }
            this.xcomp=a;
        this.ycomp=c;
        this.offset=Element.cumulativeOffset(b);
        return(c>=this.offset[1]&&c<this.offset[1]+b.offsetHeight&&a>=this.offset[0]&&a<this.offset[0]+b.offsetWidth)
        },
    withinIncludingScrolloffsets:function(b,a,d){
        var c=Element.cumulativeScrollOffset(b);
        this.xcomp=a+c[0]-this.deltaX;
        this.ycomp=d+c[1]-this.deltaY;
        this.offset=Element.cumulativeOffset(b);
        return(this.ycomp>=this.offset[1]&&this.ycomp<this.offset[1]+b.offsetHeight&&this.xcomp>=this.offset[0]&&this.xcomp<this.offset[0]+b.offsetWidth)
        },
    overlap:function(b,a){
        if(!b){
            return 0
            }
            if(b=="vertical"){
            return((this.offset[1]+a.offsetHeight)-this.ycomp)/a.offsetHeight
            }
            if(b=="horizontal"){
            return((this.offset[0]+a.offsetWidth)-this.xcomp)/a.offsetWidth
            }
        },
cumulativeOffset:Element.Methods.cumulativeOffset,
positionedOffset:Element.Methods.positionedOffset,
absolutize:function(a){
    Position.prepare();
    return Element.absolutize(a)
    },
relativize:function(a){
    Position.prepare();
    return Element.relativize(a)
    },
realOffset:Element.Methods.cumulativeScrollOffset,
offsetParent:Element.Methods.getOffsetParent,
page:Element.Methods.viewportOffset,
clone:function(b,c,a){
    a=a||{};
    
    return Element.clonePosition(c,b,a)
    }
};

if(!document.getElementsByClassName){
    document.getElementsByClassName=function(b){
        function a(c){
            return c.blank()?null:"[contains(concat(' ', @class, ' '), ' "+c+" ')]"
            }
            b.getElementsByClassName=Prototype.BrowserFeatures.XPath?function(c,e){
            e=e.toString().strip();
            var d=/\s/.test(e)?$w(e).map(a).join(""):a(e);
            return d?document._getElementsByXPath(".//*"+d,c):[]
            }:function(e,f){
            f=f.toString().strip();
            var g=[],h=(/\s/.test(f)?$w(f):null);
            if(!h&&!f){
                return g
                }
                var c=$(e).getElementsByTagName("*");
            f=" "+f+" ";
            for(var d=0,k,j;k=c[d];d++){
                if(k.className&&(j=" "+k.className+" ")&&(j.include(f)||(h&&h.all(function(i){
                    return !i.toString().blank()&&j.include(" "+i+" ")
                    })))){
                    g.push(Element.extend(k))
                    }
                }
            return g
        };
        
    return function(d,c){
        return $(c||document.body).getElementsByClassName(d)
        }
    }(Element.Methods)
}
Element.ClassNames=Class.create();
Element.ClassNames.prototype={
    initialize:function(a){
        this.element=$(a)
        },
    _each:function(a){
        this.element.className.split(/\s+/).select(function(b){
            return b.length>0
            })._each(a)
        },
    set:function(a){
        this.element.className=a
        },
    add:function(a){
        if(this.include(a)){
            return
        }
        this.set($A(this).concat(a).join(" "))
        },
    remove:function(a){
        if(!this.include(a)){
            return
        }
        this.set($A(this).without(a).join(" "))
        },
    toString:function(){
        return $A(this).join(" ")
        }
    };

Object.extend(Element.ClassNames.prototype,Enumerable);
Element.addMethods();/*
//
// Prototype Window Class
//
// Copyright (c) 2006 SÃ©bastien Gruhier (http://xilinus.com, http://itseb.com)
// 
// Permission is hereby granted, free of charge, to any person obtaining
// a copy of this software and associated documentation files (the
// "Software"), to deal in the Software without restriction, including
// without limitation the rights to use, copy, modify, merge, publish,
// distribute, sublicense, and/or sell copies of the Software, and to
// permit persons to whom the Software is furnished to do so, subject to
// the following conditions:
// 
// The above copyright notice and this permission notice shall be
// included in all copies or substantial portions of the Software.
//
// THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND,
// EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF
// MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND
// NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE
// LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION
// OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION
// WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
//
// VERSION 1.3
*/
var Window=Class.create();
Window.keepMultiModalWindow=false;
Window.hasEffectLib=(typeof Effect!="undefined");
Window.resizeEffectDuration=0.4;
Window.prototype={
    initialize:function(){
        var c;
        var b=0;
        if(arguments.length>0){
            if(typeof arguments[0]=="string"){
                c=arguments[0];
                b=1
                }else{
                c=arguments[0]?arguments[0].id:null
                }
            }
        if(!c){
        c="window_"+new Date().getTime()
        }
        if($(c)){
        alert("Window "+c+" is already registered in the DOM! Make sure you use setDestroyOnClose() or destroyOnClose: true in the constructor")
        }
        this.options=Object.extend({
        className:"dialog",
        blurClassName:null,
        minWidth:100,
        minHeight:20,
        resizable:true,
        closable:true,
        minimizable:true,
        maximizable:true,
        draggable:true,
        userData:null,
        showEffect:(Window.hasEffectLib?Effect.Appear:Element.show),
        hideEffect:(Window.hasEffectLib?Effect.Fade:Element.hide),
        showEffectOptions:{},
        hideEffectOptions:{},
        effectOptions:null,
        parent:document.body,
        title:"&nbsp;",
        url:null,
        onload:Prototype.emptyFunction,
        width:200,
        height:300,
        opacity:1,
        recenterAuto:true,
        wiredDrag:false,
        closeCallback:null,
        destroyOnClose:false,
        gridX:1,
        gridY:1
    },arguments[b]||{});
    if(this.options.blurClassName){
        this.options.focusClassName=this.options.className
        }
        if(typeof this.options.top=="undefined"&&typeof this.options.bottom=="undefined"){
        this.options.top=this._round(Math.random()*500,this.options.gridY)
        }
        if(typeof this.options.left=="undefined"&&typeof this.options.right=="undefined"){
        this.options.left=this._round(Math.random()*500,this.options.gridX)
        }
        if(this.options.effectOptions){
        Object.extend(this.options.hideEffectOptions,this.options.effectOptions);
        Object.extend(this.options.showEffectOptions,this.options.effectOptions);
        if(this.options.showEffect==Element.Appear){
            this.options.showEffectOptions.to=this.options.opacity
            }
        }
    if(Window.hasEffectLib){
    if(this.options.showEffect==Effect.Appear){
        this.options.showEffectOptions.to=this.options.opacity
        }
        if(this.options.hideEffect==Effect.Fade){
        this.options.hideEffectOptions.from=this.options.opacity
        }
    }
if(this.options.hideEffect==Element.hide){
    this.options.hideEffect=function(){
        Element.hide(this.element);
        if(this.options.destroyOnClose){
            this.destroy()
            }
        }.bind(this)
}
if(this.options.parent!=document.body){
    this.options.parent=$(this.options.parent)
    }
    this.element=this._createWindow(c);
this.element.win=this;
this.eventMouseDown=this._initDrag.bindAsEventListener(this);
this.eventMouseUp=this._endDrag.bindAsEventListener(this);
this.eventMouseMove=this._updateDrag.bindAsEventListener(this);
this.eventOnLoad=this._getWindowBorderSize.bindAsEventListener(this);
this.eventMouseDownContent=this.toFront.bindAsEventListener(this);
this.eventResize=this._recenter.bindAsEventListener(this);
this.topbar=$(this.element.id+"_top");
this.bottombar=$(this.element.id+"_bottom");
this.content=$(this.element.id+"_content");
Event.observe(this.topbar,"mousedown",this.eventMouseDown);
Event.observe(this.bottombar,"mousedown",this.eventMouseDown);
Event.observe(this.content,"mousedown",this.eventMouseDownContent);
Event.observe(window,"load",this.eventOnLoad);
Event.observe(window,"resize",this.eventResize);
Event.observe(window,"scroll",this.eventResize);
Event.observe(this.options.parent,"scroll",this.eventResize);
if(this.options.draggable){
    var a=this;
    [this.topbar,this.topbar.up().previous(),this.topbar.up().next()].each(function(d){
        d.observe("mousedown",a.eventMouseDown);
        d.addClassName("top_draggable")
        });
    [this.bottombar.up(),this.bottombar.up().previous(),this.bottombar.up().next()].each(function(d){
        d.observe("mousedown",a.eventMouseDown);
        d.addClassName("bottom_draggable")
        })
    }
    if(this.options.resizable){
    this.sizer=$(this.element.id+"_sizer");
    Event.observe(this.sizer,"mousedown",this.eventMouseDown)
    }
    this.useLeft=null;
this.useTop=null;
if(typeof this.options.left!="undefined"){
    this.element.setStyle({
        left:parseFloat(this.options.left)+"px"
        });
    this.useLeft=true
    }else{
    this.element.setStyle({
        right:parseFloat(this.options.right)+"px"
        });
    this.useLeft=false
    }
    if(typeof this.options.top!="undefined"){
    this.element.setStyle({
        top:parseFloat(this.options.top)+"px"
        });
    this.useTop=true
    }else{
    this.element.setStyle({
        bottom:parseFloat(this.options.bottom)+"px"
        });
    this.useTop=false
    }
    this.storedLocation=null;
this.setOpacity(this.options.opacity);
if(this.options.zIndex){
    this.setZIndex(this.options.zIndex)
    }
    if(this.options.destroyOnClose){
    this.setDestroyOnClose(true)
    }
    this._getWindowBorderSize();
this.width=this.options.width;
this.height=this.options.height;
this.visible=false;
this.constraint=false;
this.constraintPad={
    top:0,
    left:0,
    bottom:0,
    right:0
};

if(this.width&&this.height){
    this.setSize(this.options.width,this.options.height)
    }
    this.setTitle(this.options.title);
Windows.register(this)
},
destroy:function(){
    this._notify("onDestroy");
    Event.stopObserving(this.topbar,"mousedown",this.eventMouseDown);
    Event.stopObserving(this.bottombar,"mousedown",this.eventMouseDown);
    Event.stopObserving(this.content,"mousedown",this.eventMouseDownContent);
    Event.stopObserving(window,"load",this.eventOnLoad);
    Event.stopObserving(window,"resize",this.eventResize);
    Event.stopObserving(window,"scroll",this.eventResize);
    Event.stopObserving(this.content,"load",this.options.onload);
    if(this._oldParent){
        var c=this.getContent();
        var a=null;
        for(var b=0;b<c.childNodes.length;b++){
            a=c.childNodes[b];
            if(a.nodeType==1){
                break
            }
            a=null
            }
            if(a){
            this._oldParent.appendChild(a)
            }
            this._oldParent=null
        }
        if(this.sizer){
        Event.stopObserving(this.sizer,"mousedown",this.eventMouseDown)
        }
        if(this.options.url){
        this.content.src=null
        }
        if(this.iefix){
        Element.remove(this.iefix)
        }
        Element.remove(this.element);
    Windows.unregister(this)
    },
setCloseCallback:function(a){
    this.options.closeCallback=a
    },
getContent:function(){
    return this.content
    },
setContent:function(h,g,b){
    var a=$(h);
    if(null==a){
        throw"Unable to find element '"+h+"' in DOM"
        }
        this._oldParent=a.parentNode;
    var f=null;
    var e=null;
    if(g){
        f=Element.getDimensions(a)
        }
        if(b){
        e=Position.cumulativeOffset(a)
        }
        var c=this.getContent();
    this.setHTMLContent("");
    c=this.getContent();
    c.appendChild(a);
    a.show();
    if(g){
        this.setSize(f.width,f.height)
        }
        if(b){
        this.setLocation(e[1]-this.heightN,e[0]-this.widthW)
        }
    },
setHTMLContent:function(a){
    if(this.options.url){
        this.content.src=null;
        this.options.url=null;
        var b='<div id="'+this.getId()+'_content" class="'+this.options.className+'_content"> </div>';
        $(this.getId()+"_table_content").innerHTML=b;
        this.content=$(this.element.id+"_content")
        }
        this.getContent().innerHTML=a
    },
setAjaxContent:function(b,a,d,c){
    this.showFunction=d?"showCenter":"show";
    this.showModal=c||false;
    a=a||{};
    
    this.setHTMLContent("");
    this.onComplete=a.onComplete;
    if(!this._onCompleteHandler){
        this._onCompleteHandler=this._setAjaxContent.bind(this)
        }
        a.onComplete=this._onCompleteHandler;
    new Ajax.Request(b,a);
    a.onComplete=this.onComplete
    },
_setAjaxContent:function(a){
    Element.update(this.getContent(),a.responseText);
    if(this.onComplete){
        this.onComplete(a)
        }
        this.onComplete=null;
    this[this.showFunction](this.showModal)
    },
setURL:function(a){
    if(this.options.url){
        this.content.src=null
        }
        this.options.url=a;
    var b="<iframe frameborder='0' name='"+this.getId()+"_content'  id='"+this.getId()+"_content' src='"+a+"' width='"+this.width+"' height='"+this.height+"'> </iframe>";
    $(this.getId()+"_table_content").innerHTML=b;
    this.content=$(this.element.id+"_content")
    },
getURL:function(){
    return this.options.url?this.options.url:null
    },
refresh:function(){
    if(this.options.url){
        $(this.element.getAttribute("id")+"_content").src=this.options.url
        }
    },
setCookie:function(b,c,n,e,a){
    b=b||this.element.id;
    this.cookie=[b,c,n,e,a];
    var l=WindowUtilities.getCookie(b);
    if(l){
        var m=l.split(",");
        var j=m[0].split(":");
        var i=m[1].split(":");
        var k=parseFloat(m[2]),f=parseFloat(m[3]);
        var g=m[4];
        var d=m[5];
        this.setSize(k,f);
        if(g=="true"){
            this.doMinimize=true
            }else{
            if(d=="true"){
                this.doMaximize=true
                }
            }
        this.useLeft=j[0]=="l";
    this.useTop=i[0]=="t";
    this.element.setStyle(this.useLeft?{
        left:j[1]
        }:{
        right:j[1]
        });
    this.element.setStyle(this.useTop?{
        top:i[1]
        }:{
        bottom:i[1]
        })
    }
},
getId:function(){
    return this.element.id
    },
setDestroyOnClose:function(){
    this.options.destroyOnClose=true
    },
setConstraint:function(a,b){
    this.constraint=a;
    this.constraintPad=Object.extend(this.constraintPad,b||{});
    if(this.useTop&&this.useLeft){
        this.setLocation(parseFloat(this.element.style.top),parseFloat(this.element.style.left))
        }
    },
_initDrag:function(b){
    if(Event.element(b)==this.sizer&&this.isMinimized()){
        return
    }
    if(Event.element(b)!=this.sizer&&this.isMaximized()){
        return
    }
    if(Prototype.Browser.IE&&this.heightN==0){
        this._getWindowBorderSize()
        }
        this.pointer=[this._round(Event.pointerX(b),this.options.gridX),this._round(Event.pointerY(b),this.options.gridY)];
    if(this.options.wiredDrag){
        this.currentDrag=this._createWiredElement()
        }else{
        this.currentDrag=this.element
        }
        if(Event.element(b)==this.sizer){
        this.doResize=true;
        this.widthOrg=this.width;
        this.heightOrg=this.height;
        this.bottomOrg=parseFloat(this.element.getStyle("bottom"));
        this.rightOrg=parseFloat(this.element.getStyle("right"));
        this._notify("onStartResize")
        }else{
        this.doResize=false;
        var a=$(this.getId()+"_close");
        if(a&&Position.within(a,this.pointer[0],this.pointer[1])){
            this.currentDrag=null;
            return
        }
        this.toFront();
        if(!this.options.draggable){
            return
        }
        this._notify("onStartMove")
        }
        Event.observe(document,"mouseup",this.eventMouseUp,false);
    Event.observe(document,"mousemove",this.eventMouseMove,false);
    WindowUtilities.disableScreen("__invisible__","__invisible__",this.overlayOpacity);
    document.body.ondrag=function(){
        return false
        };
        
    document.body.onselectstart=function(){
        return false
        };
        
    this.currentDrag.show();
    Event.stop(b)
    },
_round:function(b,a){
    return a==1?b:b=Math.floor(b/a)*a
    },
_updateDrag:function(b){
    var a=[this._round(Event.pointerX(b),this.options.gridX),this._round(Event.pointerY(b),this.options.gridY)];
    var k=a[0]-this.pointer[0];
    var j=a[1]-this.pointer[1];
    if(this.doResize){
        var i=this.widthOrg+k;
        var d=this.heightOrg+j;
        k=this.width-this.widthOrg;
        j=this.height-this.heightOrg;
        if(this.useLeft){
            i=this._updateWidthConstraint(i)
            }else{
            this.currentDrag.setStyle({
                right:(this.rightOrg-k)+"px"
                })
            }
            if(this.useTop){
            d=this._updateHeightConstraint(d)
            }else{
            this.currentDrag.setStyle({
                bottom:(this.bottomOrg-j)+"px"
                })
            }
            this.setSize(i,d);
        this._notify("onResize")
        }else{
        this.pointer=a;
        if(this.useLeft){
            var c=parseFloat(this.currentDrag.getStyle("left"))+k;
            var g=this._updateLeftConstraint(c);
            this.pointer[0]+=g-c;
            this.currentDrag.setStyle({
                left:g+"px"
                })
            }else{
            this.currentDrag.setStyle({
                right:parseFloat(this.currentDrag.getStyle("right"))-k+"px"
                })
            }
            if(this.useTop){
            var f=parseFloat(this.currentDrag.getStyle("top"))+j;
            var e=this._updateTopConstraint(f);
            this.pointer[1]+=e-f;
            this.currentDrag.setStyle({
                top:e+"px"
                })
            }else{
            this.currentDrag.setStyle({
                bottom:parseFloat(this.currentDrag.getStyle("bottom"))-j+"px"
                })
            }
            this._notify("onMove")
        }
        if(this.iefix){
        this._fixIEOverlapping()
        }
        this._removeStoreLocation();
    Event.stop(b)
    },
_endDrag:function(a){
    WindowUtilities.enableScreen("__invisible__");
    if(this.doResize){
        this._notify("onEndResize")
        }else{
        this._notify("onEndMove")
        }
        Event.stopObserving(document,"mouseup",this.eventMouseUp,false);
    Event.stopObserving(document,"mousemove",this.eventMouseMove,false);
    Event.stop(a);
    this._hideWiredElement();
    this._saveCookie();
    document.body.ondrag=null;
    document.body.onselectstart=null
    },
_updateLeftConstraint:function(b){
    if(this.constraint&&this.useLeft&&this.useTop){
        var a=this.options.parent==document.body?WindowUtilities.getPageSize().windowWidth:this.options.parent.getDimensions().width;
        if(b<this.constraintPad.left){
            b=this.constraintPad.left
            }
            if(b+this.width+this.widthE+this.widthW>a-this.constraintPad.right){
            b=a-this.constraintPad.right-this.width-this.widthE-this.widthW
            }
        }
    return b
},
_updateTopConstraint:function(c){
    if(this.constraint&&this.useLeft&&this.useTop){
        var a=this.options.parent==document.body?WindowUtilities.getPageSize().windowHeight:this.options.parent.getDimensions().height;
        var b=this.height+this.heightN+this.heightS;
        if(c<this.constraintPad.top){
            c=this.constraintPad.top
            }
            if(c+b>a-this.constraintPad.bottom){
            c=a-this.constraintPad.bottom-b
            }
        }
    return c
},
_updateWidthConstraint:function(a){
    if(this.constraint&&this.useLeft&&this.useTop){
        var b=this.options.parent==document.body?WindowUtilities.getPageSize().windowWidth:this.options.parent.getDimensions().width;
        var c=parseFloat(this.element.getStyle("left"));
        if(c+a+this.widthE+this.widthW>b-this.constraintPad.right){
            a=b-this.constraintPad.right-c-this.widthE-this.widthW
            }
        }
    return a
},
_updateHeightConstraint:function(b){
    if(this.constraint&&this.useLeft&&this.useTop){
        var a=this.options.parent==document.body?WindowUtilities.getPageSize().windowHeight:this.options.parent.getDimensions().height;
        var c=parseFloat(this.element.getStyle("top"));
        if(c+b+this.heightN+this.heightS>a-this.constraintPad.bottom){
            b=a-this.constraintPad.bottom-c-this.heightN-this.heightS
            }
        }
    return b
},
_createWindow:function(a){
    var f=this.options.className;
    var d=document.createElement("div");
    d.setAttribute("id",a);
    d.className="dialog";
    var e;
    if(this.options.url){
        e='<iframe frameborder="0" name="'+a+'_content"  id="'+a+'_content" src="'+this.options.url+'"> </iframe>'
        }else{
        e='<div id="'+a+'_content" class="'+f+'_content"> </div>'
        }
        var g=this.options.closable?"<div class='"+f+"_close' id='"+a+"_close' onclick='Windows.close(\""+a+"\", event)'> </div>":"";
    var h=this.options.minimizable?"<div class='"+f+"_minimize' id='"+a+"_minimize' onclick='Windows.minimize(\""+a+"\", event)'> </div>":"";
    var i=this.options.maximizable?"<div class='"+f+"_maximize' id='"+a+"_maximize' onclick='Windows.maximize(\""+a+"\", event)'> </div>":"";
    var c=this.options.resizable?"class='"+f+"_sizer' id='"+a+"_sizer'":"class='"+f+"_se'";
    var b="../themes/default/blank.gif";
    d.innerHTML=g+h+i+"      <table id='"+a+"_row1' class=\"top table_window\">        <tr>          <td class='"+f+"_nw'></td>          <td class='"+f+"_n'><div id='"+a+"_top' class='"+f+"_title title_window'>"+this.options.title+"</div></td>          <td class='"+f+"_ne'></td>        </tr>      </table>      <table id='"+a+"_row2' class=\"mid table_window\">        <tr>          <td class='"+f+"_w'></td>            <td id='"+a+"_table_content' class='"+f+"_content' valign='top'>"+e+"</td>          <td class='"+f+"_e'></td>        </tr>      </table>        <table id='"+a+"_row3' class=\"bot table_window\">        <tr>          <td class='"+f+"_sw'></td>            <td class='"+f+"_s'><div id='"+a+"_bottom' class='status_bar'><span style='float:left; width:1px; height:1px'></span></div></td>            <td "+c+"></td>        </tr>      </table>    ";
    Element.hide(d);
    this.options.parent.insertBefore(d,this.options.parent.firstChild);
    Event.observe($(a+"_content"),"load",this.options.onload);
    return d
    },
changeClassName:function(a){
    var b=this.options.className;
    var c=this.getId();
    $A(["_close","_minimize","_maximize","_sizer","_content"]).each(function(d){
        this._toggleClassName($(c+d),b+d,a+d)
        }.bind(this));
    this._toggleClassName($(c+"_top"),b+"_title",a+"_title");
    $$("#"+c+" td").each(function(d){
        d.className=d.className.sub(b,a)
        });
    this.options.className=a
    },
_toggleClassName:function(c,b,a){
    if(c){
        c.removeClassName(b);
        c.addClassName(a)
        }
    },
setLocation:function(c,b){
    c=this._updateTopConstraint(c);
    b=this._updateLeftConstraint(b);
    var a=this.currentDrag||this.element;
    a.setStyle({
        top:c+"px"
        });
    a.setStyle({
        left:b+"px"
        });
    this.useLeft=true;
    this.useTop=true
    },
getLocation:function(){
    var a={};
    
    if(this.useTop){
        a=Object.extend(a,{
            top:this.element.getStyle("top")
            })
        }else{
        a=Object.extend(a,{
            bottom:this.element.getStyle("bottom")
            })
        }
        if(this.useLeft){
        a=Object.extend(a,{
            left:this.element.getStyle("left")
            })
        }else{
        a=Object.extend(a,{
            right:this.element.getStyle("right")
            })
        }
        return a
    },
getSize:function(){
    return{
        width:this.width,
        height:this.height
        }
    },
setSize:function(c,b,a){
    c=parseFloat(c);
    b=parseFloat(b);
    if(!this.minimized&&c<this.options.minWidth){
        c=this.options.minWidth
        }
        if(!this.minimized&&b<this.options.minHeight){
        b=this.options.minHeight
        }
        if(this.options.maxHeight&&b>this.options.maxHeight){
        b=this.options.maxHeight
        }
        if(this.options.maxWidth&&c>this.options.maxWidth){
        c=this.options.maxWidth
        }
        if(this.useTop&&this.useLeft&&Window.hasEffectLib&&Effect.ResizeWindow&&a){
        new Effect.ResizeWindow(this,null,null,c,b,{
            duration:Window.resizeEffectDuration
            })
        }else{
        this.width=c;
        this.height=b;
        var f=this.currentDrag?this.currentDrag:this.element;
        f.setStyle({
            width:c+this.widthW+this.widthE+"px"
            });
        f.setStyle({
            height:b+this.heightN+this.heightS+"px"
            });
        if(!this.currentDrag||this.currentDrag==this.element){
            var d=$(this.element.id+"_content");
            d.setStyle({
                height:b+"px"
                });
            d.setStyle({
                width:c+"px"
                })
            }
        }
},
updateHeight:function(){
    this.setSize(this.width,this.content.scrollHeight,true)
    },
updateWidth:function(){
    this.setSize(this.content.scrollWidth,this.height,true)
    },
toFront:function(){
    if(this.element.style.zIndex<Windows.maxZIndex){
        this.setZIndex(Windows.maxZIndex+1)
        }
        if(this.iefix){
        this._fixIEOverlapping()
        }
    },
getBounds:function(b){
    if(!this.width||!this.height||!this.visible){
        this.computeBounds()
        }
        var a=this.width;
    var c=this.height;
    if(!b){
        a+=this.widthW+this.widthE;
        c+=this.heightN+this.heightS
        }
        var d=Object.extend(this.getLocation(),{
        width:a+"px",
        height:c+"px"
        });
    return d
    },
computeBounds:function(){
    if(!this.width||!this.height){
        var a=WindowUtilities._computeSize(this.content.innerHTML,this.content.id,this.width,this.height,0,this.options.className);
        if(this.height){
            this.width=a+5
            }else{
            this.height=a+5
            }
        }
    this.setSize(this.width,this.height);
if(this.centered){
    this._center(this.centerTop,this.centerLeft)
    }
},
show:function(b){
    this.visible=true;
    if(b){
        if(typeof this.overlayOpacity=="undefined"){
            var a=this;
            setTimeout(function(){
                a.show(b)
                },10);
            return
        }
        Windows.addModalWindow(this);
        this.modal=true;
        this.setZIndex(Windows.maxZIndex+1);
        Windows.unsetOverflow(this)
        }else{
        if(!this.element.style.zIndex){
            this.setZIndex(Windows.maxZIndex+1)
            }
        }
    if(this.oldStyle){
    this.getContent().setStyle({
        overflow:this.oldStyle
        })
    }
    this.computeBounds();
this._notify("onBeforeShow");
if(this.options.showEffect!=Element.show&&this.options.showEffectOptions){
    this.options.showEffect(this.element,this.options.showEffectOptions)
    }else{
    this.options.showEffect(this.element)
    }
    this._checkIEOverlapping();
WindowUtilities.focusedWindow=this;
this._notify("onShow")
},
showCenter:function(a,c,b){
    this.centered=true;
    this.centerTop=c;
    this.centerLeft=b;
    this.show(a)
    },
isVisible:function(){
    return this.visible
    },
_center:function(c,b){
    var d=WindowUtilities.getWindowScroll(this.options.parent);
    var a=WindowUtilities.getPageSize(this.options.parent);
    if(typeof c=="undefined"){
        c=(a.windowHeight-(this.height+this.heightN+this.heightS))/2
        }
        c+=d.top;
    if(typeof b=="undefined"){
        b=(a.windowWidth-(this.width+this.widthW+this.widthE))/2
        }
        b+=d.left;
    this.setLocation(c,b);
    this.toFront()
    },
_recenter:function(b){
    if(this.centered){
        var a=WindowUtilities.getPageSize(this.options.parent);
        var c=WindowUtilities.getWindowScroll(this.options.parent);
        if(this.pageSize&&this.pageSize.windowWidth==a.windowWidth&&this.pageSize.windowHeight==a.windowHeight&&this.windowScroll.left==c.left&&this.windowScroll.top==c.top){
            return
        }
        this.pageSize=a;
        this.windowScroll=c;
        if($("overlay_modal")){
            $("overlay_modal").setStyle({
                height:(a.pageHeight+"px")
                })
            }
            if(this.options.recenterAuto){
            this._center(this.centerTop,this.centerLeft)
            }
        }
},
hide:function(){
    this.visible=false;
    if(this.modal){
        Windows.removeModalWindow(this);
        Windows.resetOverflow()
        }
        this.oldStyle=this.getContent().getStyle("overflow")||"auto";
    this.getContent().setStyle({
        overflow:"hidden"
    });
    this.options.hideEffect(this.element,this.options.hideEffectOptions);
    if(this.iefix){
        this.iefix.hide()
        }
        if(!this.doNotNotifyHide){
        this._notify("onHide")
        }
    },
close:function(){
    if(this.visible){
        if(this.options.closeCallback&&!this.options.closeCallback(this)){
            return
        }
        if(this.options.destroyOnClose){
            var a=this.destroy.bind(this);
            if(this.options.hideEffectOptions.afterFinish){
                var b=this.options.hideEffectOptions.afterFinish;
                this.options.hideEffectOptions.afterFinish=function(){
                    b();
                    a()
                    }
                }else{
            this.options.hideEffectOptions.afterFinish=function(){
                a()
                }
            }
    }
Windows.updateFocusedWindow();
this.doNotNotifyHide=true;
this.hide();
this.doNotNotifyHide=false;
this._notify("onClose")
}
},
minimize:function(){
    if(this.resizing){
        return
    }
    var a=$(this.getId()+"_row2");
    if(!this.minimized){
        this.minimized=true;
        var d=a.getDimensions().height;
        this.r2Height=d;
        var c=this.element.getHeight()-d;
        if(this.useLeft&&this.useTop&&Window.hasEffectLib&&Effect.ResizeWindow){
            new Effect.ResizeWindow(this,null,null,null,this.height-d,{
                duration:Window.resizeEffectDuration
                })
            }else{
            this.height-=d;
            this.element.setStyle({
                height:c+"px"
                });
            a.hide()
            }
            if(!this.useTop){
            var b=parseFloat(this.element.getStyle("bottom"));
            this.element.setStyle({
                bottom:(b+d)+"px"
                })
            }
        }else{
    this.minimized=false;
    var d=this.r2Height;
    this.r2Height=null;
    if(this.useLeft&&this.useTop&&Window.hasEffectLib&&Effect.ResizeWindow){
        new Effect.ResizeWindow(this,null,null,null,this.height+d,{
            duration:Window.resizeEffectDuration
            })
        }else{
        var c=this.element.getHeight()+d;
        this.height+=d;
        this.element.setStyle({
            height:c+"px"
            });
        a.show()
        }
        if(!this.useTop){
        var b=parseFloat(this.element.getStyle("bottom"));
        this.element.setStyle({
            bottom:(b-d)+"px"
            })
        }
        this.toFront()
    }
    this._notify("onMinimize");
this._saveCookie()
},
maximize:function(){
    if(this.isMinimized()||this.resizing){
        return
    }
    if(Prototype.Browser.IE&&this.heightN==0){
        this._getWindowBorderSize()
        }
        if(this.storedLocation!=null){
        this._restoreLocation();
        if(this.iefix){
            this.iefix.hide()
            }
        }else{
    this._storeLocation();
    Windows.unsetOverflow(this);
    var g=WindowUtilities.getWindowScroll(this.options.parent);
    var b=WindowUtilities.getPageSize(this.options.parent);
    var f=g.left;
    var e=g.top;
    if(this.options.parent!=document.body){
        g={
            top:0,
            left:0,
            bottom:0,
            right:0
        };
        
        var d=this.options.parent.getDimensions();
        b.windowWidth=d.width;
        b.windowHeight=d.height;
        e=0;
        f=0
        }
        if(this.constraint){
        b.windowWidth-=Math.max(0,this.constraintPad.left)+Math.max(0,this.constraintPad.right);
        b.windowHeight-=Math.max(0,this.constraintPad.top)+Math.max(0,this.constraintPad.bottom);
        f+=Math.max(0,this.constraintPad.left);
        e+=Math.max(0,this.constraintPad.top)
        }
        var c=b.windowWidth-this.widthW-this.widthE;
    var a=b.windowHeight-this.heightN-this.heightS;
    if(this.useLeft&&this.useTop&&Window.hasEffectLib&&Effect.ResizeWindow){
        new Effect.ResizeWindow(this,e,f,c,a,{
            duration:Window.resizeEffectDuration
            })
        }else{
        this.setSize(c,a);
        this.element.setStyle(this.useLeft?{
            left:f
        }:{
            right:f
        });
        this.element.setStyle(this.useTop?{
            top:e
        }:{
            bottom:e
        })
        }
        this.toFront();
    if(this.iefix){
        this._fixIEOverlapping()
        }
    }
this._notify("onMaximize");
this._saveCookie()
},
isMinimized:function(){
    return this.minimized
    },
isMaximized:function(){
    return(this.storedLocation!=null)
    },
setOpacity:function(a){
    if(Element.setOpacity){
        Element.setOpacity(this.element,a)
        }
    },
setZIndex:function(a){
    this.element.setStyle({
        zIndex:a
    });
    Windows.updateZindex(a,this)
    },
setTitle:function(a){
    if(!a||a==""){
        a="&nbsp;"
        }
        Element.update(this.element.id+"_top",a)
    },
getTitle:function(){
    return $(this.element.id+"_top").innerHTML
    },
setStatusBar:function(b){
    var a=$(this.getId()+"_bottom");
    if(typeof(b)=="object"){
        if(this.bottombar.firstChild){
            this.bottombar.replaceChild(b,this.bottombar.firstChild)
            }else{
            this.bottombar.appendChild(b)
            }
        }else{
    this.bottombar.innerHTML=b
    }
},
_checkIEOverlapping:function(){
    if(!this.iefix&&(navigator.appVersion.indexOf("MSIE")>0)&&(navigator.userAgent.indexOf("Opera")<0)&&(this.element.getStyle("position")=="absolute")){
        new Insertion.After(this.element.id,'<iframe id="'+this.element.id+'_iefix" style="display:none;position:absolute;filter:progid:DXImageTransform.Microsoft.Alpha(opacity=0);" src="javascript:false;" frameborder="0" scrolling="no"></iframe>');
        this.iefix=$(this.element.id+"_iefix")
        }
        if(this.iefix){
        setTimeout(this._fixIEOverlapping.bind(this),50)
        }
    },
_fixIEOverlapping:function(){
    Position.clone(this.element,this.iefix);
    this.iefix.style.zIndex=this.element.style.zIndex-1;
    this.iefix.show()
    },
_getWindowBorderSize:function(b){
    var c=this._createHiddenDiv(this.options.className+"_n");
    this.heightN=Element.getDimensions(c).height;
    c.parentNode.removeChild(c);
    var c=this._createHiddenDiv(this.options.className+"_s");
    this.heightS=Element.getDimensions(c).height;
    c.parentNode.removeChild(c);
    var c=this._createHiddenDiv(this.options.className+"_e");
    this.widthE=Element.getDimensions(c).width;
    c.parentNode.removeChild(c);
    var c=this._createHiddenDiv(this.options.className+"_w");
    this.widthW=Element.getDimensions(c).width;
    c.parentNode.removeChild(c);
    var c=document.createElement("div");
    c.className="overlay_"+this.options.className;
    document.body.appendChild(c);
    var a=this;
    setTimeout(function(){
        a.overlayOpacity=($(c).getStyle("opacity"));
        c.parentNode.removeChild(c)
        },10);
    if(Prototype.Browser.IE){
        this.heightS=$(this.getId()+"_row3").getDimensions().height;
        this.heightN=$(this.getId()+"_row1").getDimensions().height
        }
        if(Prototype.Browser.WebKit&&Prototype.Browser.WebKitVersion<420){
        this.setSize(this.width,this.height)
        }
        if(this.doMaximize){
        this.maximize()
        }
        if(this.doMinimize){
        this.minimize()
        }
    },
_createHiddenDiv:function(b){
    var a=document.body;
    var c=document.createElement("div");
    c.setAttribute("id",this.element.id+"_tmp");
    c.className=b;
    c.style.display="none";
    c.innerHTML="";
    a.insertBefore(c,a.firstChild);
    return c
    },
_storeLocation:function(){
    if(this.storedLocation==null){
        this.storedLocation={
            useTop:this.useTop,
            useLeft:this.useLeft,
            top:this.element.getStyle("top"),
            bottom:this.element.getStyle("bottom"),
            left:this.element.getStyle("left"),
            right:this.element.getStyle("right"),
            width:this.width,
            height:this.height
            }
        }
},
_restoreLocation:function(){
    if(this.storedLocation!=null){
        this.useLeft=this.storedLocation.useLeft;
        this.useTop=this.storedLocation.useTop;
        if(this.useLeft&&this.useTop&&Window.hasEffectLib&&Effect.ResizeWindow){
            new Effect.ResizeWindow(this,this.storedLocation.top,this.storedLocation.left,this.storedLocation.width,this.storedLocation.height,{
                duration:Window.resizeEffectDuration
                })
            }else{
            this.element.setStyle(this.useLeft?{
                left:this.storedLocation.left
                }:{
                right:this.storedLocation.right
                });
            this.element.setStyle(this.useTop?{
                top:this.storedLocation.top
                }:{
                bottom:this.storedLocation.bottom
                });
            this.setSize(this.storedLocation.width,this.storedLocation.height)
            }
            Windows.resetOverflow();
        this._removeStoreLocation()
        }
    },
_removeStoreLocation:function(){
    this.storedLocation=null
    },
_saveCookie:function(){
    if(this.cookie){
        var a="";
        if(this.useLeft){
            a+="l:"+(this.storedLocation?this.storedLocation.left:this.element.getStyle("left"))
            }else{
            a+="r:"+(this.storedLocation?this.storedLocation.right:this.element.getStyle("right"))
            }
            if(this.useTop){
            a+=",t:"+(this.storedLocation?this.storedLocation.top:this.element.getStyle("top"))
            }else{
            a+=",b:"+(this.storedLocation?this.storedLocation.bottom:this.element.getStyle("bottom"))
            }
            a+=","+(this.storedLocation?this.storedLocation.width:this.width);
        a+=","+(this.storedLocation?this.storedLocation.height:this.height);
        a+=","+this.isMinimized();
        a+=","+this.isMaximized();
        WindowUtilities.setCookie(a,this.cookie)
        }
    },
_createWiredElement:function(){
    if(!this.wiredElement){
        if(Prototype.Browser.IE){
            this._getWindowBorderSize()
            }
            var b=document.createElement("div");
        b.className="wired_frame "+this.options.className+"_wired_frame";
        b.style.position="absolute";
        this.options.parent.insertBefore(b,this.options.parent.firstChild);
        this.wiredElement=$(b)
        }
        if(this.useLeft){
        this.wiredElement.setStyle({
            left:this.element.getStyle("left")
            })
        }else{
        this.wiredElement.setStyle({
            right:this.element.getStyle("right")
            })
        }
        if(this.useTop){
        this.wiredElement.setStyle({
            top:this.element.getStyle("top")
            })
        }else{
        this.wiredElement.setStyle({
            bottom:this.element.getStyle("bottom")
            })
        }
        var a=this.element.getDimensions();
    this.wiredElement.setStyle({
        width:a.width+"px",
        height:a.height+"px"
        });
    this.wiredElement.setStyle({
        zIndex:Windows.maxZIndex+30
        });
    return this.wiredElement
    },
_hideWiredElement:function(){
    if(!this.wiredElement||!this.currentDrag){
        return
    }
    if(this.currentDrag==this.element){
        this.currentDrag=null
        }else{
        if(this.useLeft){
            this.element.setStyle({
                left:this.currentDrag.getStyle("left")
                })
            }else{
            this.element.setStyle({
                right:this.currentDrag.getStyle("right")
                })
            }
            if(this.useTop){
            this.element.setStyle({
                top:this.currentDrag.getStyle("top")
                })
            }else{
            this.element.setStyle({
                bottom:this.currentDrag.getStyle("bottom")
                })
            }
            this.currentDrag.hide();
        this.currentDrag=null;
        if(this.doResize){
            this.setSize(this.width,this.height)
            }
        }
},
_notify:function(a){
    if(this.options[a]){
        this.options[a](this)
        }else{
        Windows.notify(a,this)
        }
    }
};

var Windows={
    windows:[],
    modalWindows:[],
    observers:[],
    focusedWindow:null,
    maxZIndex:0,
    overlayShowEffectOptions:{
        duration:0.5
    },
    overlayHideEffectOptions:{
        duration:0.5
    },
    addObserver:function(a){
        this.removeObserver(a);
        this.observers.push(a)
        },
    removeObserver:function(a){
        this.observers=this.observers.reject(function(b){
            return b==a
            })
        },
    notify:function(a,b){
        this.observers.each(function(c){
            if(c[a]){
                c[a](a,b)
                }
            })
    },
getWindow:function(a){
    return this.windows.detect(function(b){
        return b.getId()==a
        })
    },
getFocusedWindow:function(){
    return this.focusedWindow
    },
updateFocusedWindow:function(){
    this.focusedWindow=this.windows.length>=2?this.windows[this.windows.length-2]:null
    },
register:function(a){
    this.windows.push(a)
    },
addModalWindow:function(a){
    if(this.modalWindows.length==0){
        WindowUtilities.disableScreen(a.options.className,"overlay_modal",a.overlayOpacity,a.getId(),a.options.parent)
        }else{
        if(Window.keepMultiModalWindow){
            $("overlay_modal").style.zIndex=Windows.maxZIndex+1;
            Windows.maxZIndex+=1;
            WindowUtilities._hideSelect(this.modalWindows.last().getId())
            }else{
            this.modalWindows.last().element.hide()
            }
            WindowUtilities._showSelect(a.getId())
        }
        this.modalWindows.push(a)
    },
removeModalWindow:function(a){
    this.modalWindows.pop();
    if(this.modalWindows.length==0){
        WindowUtilities.enableScreen()
        }else{
        if(Window.keepMultiModalWindow){
            this.modalWindows.last().toFront();
            WindowUtilities._showSelect(this.modalWindows.last().getId())
            }else{
            this.modalWindows.last().element.show()
            }
        }
},
register:function(a){
    this.windows.push(a)
    },
unregister:function(a){
    this.windows=this.windows.reject(function(b){
        return b==a
        })
    },
closeAll:function(){
    this.windows.each(function(a){
        Windows.close(a.getId())
        })
    },
closeAllModalWindows:function(){
    WindowUtilities.enableScreen();
    this.modalWindows.each(function(a){
        if(a){
            a.close()
            }
        })
},
minimize:function(c,a){
    var b=this.getWindow(c);
    if(b&&b.visible){
        b.minimize()
        }
        Event.stop(a)
    },
maximize:function(c,a){
    var b=this.getWindow(c);
    if(b&&b.visible){
        b.maximize()
        }
        Event.stop(a)
    },
close:function(c,a){
    var b=this.getWindow(c);
    if(b){
        b.close()
        }
        if(a){
        Event.stop(a)
        }
    },
blur:function(b){
    var a=this.getWindow(b);
    if(!a){
        return
    }
    if(a.options.blurClassName){
        a.changeClassName(a.options.blurClassName)
        }
        if(this.focusedWindow==a){
        this.focusedWindow=null
        }
        a._notify("onBlur")
    },
focus:function(b){
    var a=this.getWindow(b);
    if(!a){
        return
    }
    if(this.focusedWindow){
        this.blur(this.focusedWindow.getId())
        }
        if(a.options.focusClassName){
        a.changeClassName(a.options.focusClassName)
        }
        this.focusedWindow=a;
    a._notify("onFocus")
    },
unsetOverflow:function(a){
    this.windows.each(function(b){
        b.oldOverflow=b.getContent().getStyle("overflow")||"auto";
        b.getContent().setStyle({
            overflow:"hidden"
        })
        });
    if(a&&a.oldOverflow){
        a.getContent().setStyle({
            overflow:a.oldOverflow
            })
        }
    },
resetOverflow:function(){
    this.windows.each(function(a){
        if(a.oldOverflow){
            a.getContent().setStyle({
                overflow:a.oldOverflow
                })
            }
        })
},
updateZindex:function(a,b){
    if(a>this.maxZIndex){
        this.maxZIndex=a;
        if(this.focusedWindow){
            this.blur(this.focusedWindow.getId())
            }
        }
    this.focusedWindow=b;
if(this.focusedWindow){
    this.focus(this.focusedWindow.getId())
    }
}
};

var Dialog={
    dialogId:null,
    onCompleteFunc:null,
    callFunc:null,
    parameters:null,
    confirm:function(d,c){
        if(d&&typeof d!="string"){
            Dialog._runAjaxRequest(d,c,Dialog.confirm);
            return
        }
        d=d||"";
        c=c||{};
        
        var f=c.okLabel?c.okLabel:"Ok";
        var a=c.cancelLabel?c.cancelLabel:"Cancel";
        c=Object.extend(c,c.windowParameters||{});
        c.windowParameters=c.windowParameters||{};
        
        c.className=c.className||"alert";
        var b="class ='"+(c.buttonClass?c.buttonClass+" ":"")+" ok_button'";
        var e="class ='"+(c.buttonClass?c.buttonClass+" ":"")+" cancel_button'";
        var d="      <div class='"+c.className+"_message'>"+d+"</div>        <div class='"+c.className+"_buttons'>          <input type='button' value='"+f+"' onclick='Dialog.okCallback()' "+b+"/>          <input type='button' value='"+a+"' onclick='Dialog.cancelCallback()' "+e+"/>        </div>    ";
        return this._openDialog(d,c)
        },
    alert:function(c,b){
        if(c&&typeof c!="string"){
            Dialog._runAjaxRequest(c,b,Dialog.alert);
            return
        }
        c=c||"";
        b=b||{};
        
        var d=b.okLabel?b.okLabel:"Ok";
        b=Object.extend(b,b.windowParameters||{});
        b.windowParameters=b.windowParameters||{};
        
        b.className=b.className||"alert";
        var a="class ='"+(b.buttonClass?b.buttonClass+" ":"")+" ok_button'";
        var c="      <div class='"+b.className+"_message'>"+c+"</div>        <div class='"+b.className+"_buttons'>          <input type='button' value='"+d+"' onclick='Dialog.okCallback()' "+a+"/>        </div>";
        return this._openDialog(c,b)
        },
    info:function(b,a){
        if(b&&typeof b!="string"){
            Dialog._runAjaxRequest(b,a,Dialog.info);
            return
        }
        b=b||"";
        a=a||{};
        
        a=Object.extend(a,a.windowParameters||{});
        a.windowParameters=a.windowParameters||{};
        
        a.className=a.className||"alert";
        var b="<div id='modal_dialog_message' class='"+a.className+"_message'>"+b+"</div>";
        if(a.showProgress){
            b+="<div id='modal_dialog_progress' class='"+a.className+"_progress'>  </div>"
            }
            a.ok=null;
        a.cancel=null;
        return this._openDialog(b,a)
        },
    setInfoMessage:function(a){
        $("modal_dialog_message").update(a)
        },
    closeInfo:function(){
        Windows.close(this.dialogId)
        },
    _openDialog:function(e,d){
        var c=d.className;
        if(!d.height&&!d.width){
            d.width=WindowUtilities.getPageSize(d.options.parent||document.body).pageWidth/2
            }
            if(d.id){
            this.dialogId=d.id
            }else{
            var b=new Date();
            this.dialogId="modal_dialog_"+b.getTime();
            d.id=this.dialogId
            }
            if(!d.height||!d.width){
            var a=WindowUtilities._computeSize(e,this.dialogId,d.width,d.height,5,c);
            if(d.height){
                d.width=a+5
                }else{
                d.height=a+5
                }
            }
        d.effectOptions=d.effectOptions;
    d.resizable=d.resizable||false;
    d.minimizable=d.minimizable||false;
    d.maximizable=d.maximizable||false;
    d.draggable=d.draggable||false;
    d.closable=d.closable||false;
    var f=new Window(d);
    f.getContent().innerHTML=e;
    f.showCenter(true,d.top,d.left);
    f.setDestroyOnClose();
    f.cancelCallback=d.onCancel||d.cancel;
    f.okCallback=d.onOk||d.ok;
    return f
    },
_getAjaxContent:function(a){
    Dialog.callFunc(a.responseText,Dialog.parameters)
    },
_runAjaxRequest:function(c,b,a){
    if(c.options==null){
        c.options={}
    }
    Dialog.onCompleteFunc=c.options.onComplete;
Dialog.parameters=b;
Dialog.callFunc=a;
c.options.onComplete=Dialog._getAjaxContent;
new Ajax.Request(c.url,c.options)
},
okCallback:function(){
    var a=Windows.focusedWindow;
    if(!a.okCallback||a.okCallback(a)){
        $$("#"+a.getId()+" input").each(function(b){
            b.onclick=null
            });
        a.close()
        }
    },
cancelCallback:function(){
    var a=Windows.focusedWindow;
    $$("#"+a.getId()+" input").each(function(b){
        b.onclick=null
        });
    a.close();
    if(a.cancelCallback){
        a.cancelCallback(a)
        }
    }
};

if(Prototype.Browser.WebKit){
    var array=navigator.userAgent.match(new RegExp(/AppleWebKit\/([\d\.\+]*)/));
    Prototype.Browser.WebKitVersion=parseFloat(array[1])
        }
        var WindowUtilities={
    getWindowScroll:function(parent){
        var T,L,W,H;
        parent=parent||document.body;
        if(parent!=document.body){
            T=parent.scrollTop;
            L=parent.scrollLeft;
            W=parent.scrollWidth;
            H=parent.scrollHeight
            }else{
            var w=window;
            with(w.document){
                if(w.document.documentElement&&documentElement.scrollTop){
                    T=documentElement.scrollTop;
                    L=documentElement.scrollLeft
                    }else{
                    if(w.document.body){
                        T=body.scrollTop;
                        L=body.scrollLeft
                        }
                    }
                if(w.innerWidth){
                W=w.innerWidth;
                H=w.innerHeight
                }else{
                if(w.document.documentElement&&documentElement.clientWidth){
                    W=documentElement.clientWidth;
                    H=documentElement.clientHeight
                    }else{
                    W=body.offsetWidth;
                    H=body.offsetHeight
                    }
                }
        }
}
return{
    top:T,
    left:L,
    width:W,
    height:H
}
},
getPageSize:function(d){
    d=d||document.body;
    var c,g;
    var e,b;
    if(d!=document.body){
        c=d.getWidth();
        g=d.getHeight();
        b=d.scrollWidth;
        e=d.scrollHeight
        }else{
        var f,a;
        if(window.innerHeight&&window.scrollMaxY){
            f=document.body.scrollWidth;
            a=window.innerHeight+window.scrollMaxY
            }else{
            if(document.body.scrollHeight>document.body.offsetHeight){
                f=document.body.scrollWidth;
                a=document.body.scrollHeight
                }else{
                f=document.body.offsetWidth;
                a=document.body.offsetHeight
                }
            }
        if(self.innerHeight){
        c=self.innerWidth;
        g=self.innerHeight
        }else{
        if(document.documentElement&&document.documentElement.clientHeight){
            c=document.documentElement.clientWidth;
            g=document.documentElement.clientHeight
            }else{
            if(document.body){
                c=document.body.clientWidth;
                g=document.body.clientHeight
                }
            }
    }
if(a<g){
    e=g
    }else{
    e=a
    }
    if(f<c){
    b=c
    }else{
    b=f
    }
}
return{
    pageWidth:b,
    pageHeight:e,
    windowWidth:c,
    windowHeight:g
}
},
disableScreen:function(c,a,d,e,b){
    WindowUtilities.initLightbox(a,c,function(){
        this._disableScreen(c,a,d,e)
        }.bind(this),b||document.body)
    },
_disableScreen:function(c,b,e,f){
    var d=$(b);
    var a=WindowUtilities.getPageSize(d.parentNode);
    if(f&&Prototype.Browser.IE){
        WindowUtilities._hideSelect();
        WindowUtilities._showSelect(f)
        }
        d.style.height=(a.pageHeight+"px");
    d.style.display="none";
    if(b=="overlay_modal"&&Window.hasEffectLib&&Windows.overlayShowEffectOptions){
        d.overlayOpacity=e;
        new Effect.Appear(d,Object.extend({
            from:0,
            to:e
        },Windows.overlayShowEffectOptions))
        }else{
        d.style.display="block"
        }
    },
enableScreen:function(b){
    b=b||"overlay_modal";
    var a=$(b);
    if(a){
        if(b=="overlay_modal"&&Window.hasEffectLib&&Windows.overlayHideEffectOptions){
            new Effect.Fade(a,Object.extend({
                from:a.overlayOpacity,
                to:0
            },Windows.overlayHideEffectOptions))
            }else{
            a.style.display="none";
            a.parentNode.removeChild(a)
            }
            if(b!="__invisible__"){
            WindowUtilities._showSelect()
            }
        }
},
_hideSelect:function(a){
    if(Prototype.Browser.IE){
        a=a==null?"":"#"+a+" ";
        $$(a+"select").each(function(b){
            if(!WindowUtilities.isDefined(b.oldVisibility)){
                b.oldVisibility=b.style.visibility?b.style.visibility:"visible";
                b.style.visibility="hidden"
                }
            })
    }
},
_showSelect:function(a){
    if(Prototype.Browser.IE){
        a=a==null?"":"#"+a+" ";
        $$(a+"select").each(function(b){
            if(WindowUtilities.isDefined(b.oldVisibility)){
                try{
                    b.style.visibility=b.oldVisibility
                    }catch(c){
                    b.style.visibility="visible"
                    }
                    b.oldVisibility=null
                }else{
                if(b.style.visibility){
                    b.style.visibility="visible"
                    }
                }
        })
}
},
isDefined:function(a){
    return typeof(a)!="undefined"&&a!=null
    },
initLightbox:function(e,c,a,b){
    if($(e)){
        Element.setStyle(e,{
            zIndex:Windows.maxZIndex+1
            });
        Windows.maxZIndex++;
        a()
        }else{
        var d=document.createElement("div");
        d.setAttribute("id",e);
        d.className="overlay_"+c;
        d.style.display="none";
        d.style.position="absolute";
        d.style.top="0";
        d.style.left="0";
        d.style.zIndex=Windows.maxZIndex+1;
        Windows.maxZIndex++;
        d.style.width="100%";
        b.insertBefore(d,b.firstChild);
        if(Prototype.Browser.WebKit&&e=="overlay_modal"){
            setTimeout(function(){
                a()
                },10)
            }else{
            a()
            }
        }
},
setCookie:function(b,a){
    document.cookie=a[0]+"="+escape(b)+((a[1])?"; expires="+a[1].toGMTString():"")+((a[2])?"; path="+a[2]:"")+((a[3])?"; domain="+a[3]:"")+((a[4])?"; secure":"")
    },
getCookie:function(c){
    var b=document.cookie;
    var e=c+"=";
    var d=b.indexOf("; "+e);
    if(d==-1){
        d=b.indexOf(e);
        if(d!=0){
            return null
            }
        }else{
    d+=2
    }
    var a=document.cookie.indexOf(";",d);
if(a==-1){
    a=b.length
    }
    return unescape(b.substring(d+e.length,a))
},
_computeSize:function(e,a,b,g,d,f){
    var i=document.body;
    var c=document.createElement("div");
    c.setAttribute("id",a);
    c.className=f+"_content";
    if(g){
        c.style.height=g+"px"
        }else{
        c.style.width=b+"px"
        }
        c.style.position="absolute";
    c.style.top="0";
    c.style.left="0";
    c.style.display="none";
    c.innerHTML=e;
    i.insertBefore(c,i.firstChild);
    var h;
    if(g){
        h=$(c).getDimensions().width+d
        }else{
        h=$(c).getDimensions().height+d
        }
        i.removeChild(c);
    return h
    }
};/*
 * @description		prototype.js based context menu
 * @author        Juriy Zaytsev; kangax [at] gmail [dot] com; http://thinkweb2.com/projects/prototype/
 * @version       0.6
 * @date          12/03/07
 * @requires      prototype.js 1.6
 * @license:      MIT License
*/
if(Object.isUndefined(Proto)){
    var Proto={}
}
Proto.Menu=Class.create({
    initialize:function(){
        var b=Prototype.emptyFunction;
        this.ie=Prototype.Browser.IE;
        this.options=Object.extend({
            selector:".contextmenu",
            className:"protoMenu",
            pageOffset:25,
            fade:false,
            zIndex:100,
            beforeShow:b,
            beforeHide:b,
            beforeSelect:b
        },arguments[0]||{});
        this.shim=new Element("iframe",{
            style:"position:absolute;filter:progid:DXImageTransform.Microsoft.Alpha(opacity=0);display:none",
            src:"javascript:false;",
            frameborder:0
        });
        this.options.fade=this.options.fade&&!Object.isUndefined(Effect);
        this.container=new Element("div",{
            className:this.options.className,
            style:"display:none"
        });
        var a=new Element("ul");
        this.options.menuItems.each(function(c){
            a.insert(new Element("li",{
                className:c.separator?"separator":""
                }).insert(c.separator?"":Object.extend(new Element("a",{
                href:"#",
                title:c.name,
                className:(c.className||"")+(c.disabled?" disabled":" enabled")
                }),{
                _callback:c.callback
                }).observe("click",this.onClick.bind(this)).observe("contextmenu",Event.stop).update(c.name)))
            }.bind(this));
        $(document.body).insert(this.container.insert(a).observe("contextmenu",Event.stop));
        if(this.ie){
            $(document.body).insert(this.shim)
            }
            document.observe("click",function(c){
            if(this.container.visible()&&!c.isRightClick()){
                this.options.beforeHide(c);
                if(this.ie){
                    this.shim.hide()
                    }
                    this.container.hide()
                }
            }.bind(this));
    document.observe(Prototype.Browser.Opera?"click":"contextmenu",function(f){
        if(Prototype.Browser.Opera&&!f.ctrlKey){
            return
        }
        var c=Event.element(f);
        var d=null;
        if(Element.match(c,this.options.selector)){
            d=c
            }else{
            d=Element.up(c,this.options.selector)
            }
            if(!d){
            return
        }
        f.contextMenuElement=d;
        f.contextMenuContainerElement=this.container;
        this.show(f)
        }.bind(this))
    },
show:function(g){
    g.stop();
    this.options.beforeShow(g);
    var b=Event.pointer(g).x,h=Event.pointer(g).y,d=document.viewport.getDimensions(),f=document.viewport.getScrollOffsets(),a=this.container.getDimensions(),c={
        left:((b+a.width+this.options.pageOffset)>d.width?(d.width-a.width-this.options.pageOffset):b)+"px",
        top:((h-f.top+a.height)>d.height&&(h-f.top)>a.height?(h-a.height):h)+"px"
        };
        
    this.container.setStyle(c).setStyle({
        zIndex:this.options.zIndex
        });
    if(this.ie){
        this.shim.setStyle(Object.extend(Object.extend(a,c),{
            zIndex:this.options.zIndex-1
            })).show()
        }
        this.options.fade?Effect.Appear(this.container,{
        duration:0.25
    }):this.container.show();
    this.event=g
    },
onClick:function(a){
    a.stop();
    if(a.target._callback&&!a.target.hasClassName("disabled")){
        this.options.beforeSelect(a);
        if(this.ie){
            this.shim.hide()
            }
            this.container.hide();
        a.target._callback(this.event)
        }
    }
});/*
 
 ColorZilla persistence library
 
 Copyright (c) Alex Sirota 2010, All Rights Reserved

 Please do not use without permission

*/
if(typeof ColorZilla=="undefined"){
    var ColorZilla={}
}
ColorZilla.Cookie={
    set:function(c,f,b,e,g){
        if(typeof e=="undefined"){
            e=".colorzilla.com"
            }
            if(typeof g=="undefined"){
            g="/"
            }
            var a="";
        if(b!=undefined){
            var h=new Date();
            h.setTime(h.getTime()+(86400000*parseFloat(b)));
            a="; expires="+h.toGMTString()
            }
            e="; domain="+e;
        g="; path="+g;
        return(document.cookie=escape(c)+"="+escape(f||"")+a+e+g)
        },
    get:function(a){
        var b=document.cookie.match(new RegExp("(^|;)\\s*"+escape(a)+"=([^;\\s]*)"));
        return(b?unescape(b[2]):null)
        },
    remove:function(a){
        var b=ColorZilla.Cookie.get(a)||true;
        ColorZilla.Cookie.set(a,"",-1);
        return b
        }
    };

ColorZilla.Persist={
    _cookieName:"persist",
    _dict:{},
    _fromCookie:function(){
        this._dict={};
        
        var e=ColorZilla.Cookie.get(this._cookieName);
        if(!e){
            return{}
        }
        var a=e.split("&");
    for(var c=0;c<a.length;c++){
        var d=a[c].split("=");
        if(d.length!=2){
            continue
        }
        var b=unescape(d[0]);
        var e=unescape(d[1]);
        this._dict[b]=e
        }
        return this._dict
    },
_toCookie:function(){
    var a="";
    for(key in this._dict){
        if(a!=""){
            a+="&"
            }
            a+=escape(key)+"="+escape(this._dict[key])
        }
        ColorZilla.Cookie.set(this._cookieName,a,365*30)
    },
get:function(a,b){
    this._fromCookie();
    return(typeof this._dict[a]=="undefined")?b:this._dict[a]
    },
set:function(a,b){
    this._fromCookie();
    this._dict[a]=b;
    this._toCookie()
    },
remove:function(a,b){
    this._fromCookie();
    if(typeof this._dict[a]!="undefined"){
        delete this._dict[a]
    }
    this._toCookie()
    },
setAndReload:function(a,b){
    this.set(a,b);
    window.location.reload(true)
    }
};

ColorZilla.LocalStorage={
    isSupported:function(){
        try{
            return"localStorage" in window&&window.localStorage!==null
            }catch(a){
            return false
            }
        },
get:function(a,d){
    if(!this.isSupported()){
        return d
        }
        try{
        var c=localStorage.getItem(a);
        return(c!=null)?c:d
        }catch(b){
        return d
        }
    },
set:function(a,c){
    if(!this.isSupported()){
        return false
        }
        try{
        localStorage.setItem(a,c);
        return true
        }catch(b){
        return false
        }
    },
remove:function(a,c){
    if(!this.isSupported()){
        return false
        }
        try{
        localStorage.removeItem(a,c);
        return true
        }catch(b){
        return false
        }
    }
};/* 
 * CSS Gradient Editor Gradient Database
 */
if(typeof Gradient=="undefined"){
    var Gradient={}
}
Gradient.DB={
    UltimateWeb2:{
        name:"Ultimate Web 2.0 Gradients",
        license:'derived from <a target="_blank" href="http://www.dezinerfolio.com/2007/05/06/ultimate-web-20-layer-styles">deziner folio</a>, <a target="_blank" href="http://sglider12.blogspot.com/">SGlider12</a> <a target="_blank" href="http://creativecommons.org/licenses/by-sa/2.5/in/">(cc) by-sa</a>',
        gradients:[{
            name:"Blue Gloss Default",
            stops:[{
                color:"#1E5799",
                position:"0%"
            },{
                color:"#2989D8",
                position:"50%"
            },{
                color:"#207cca",
                position:"51%"
            },{
                color:"#7db9e8",
                position:"100%"
            }]
            },{
            name:"Black Gloss #1",
            stops:[{
                color:"#4c4c4c",
                position:"0%"
            },{
                color:"#595959",
                position:"12%"
            },{
                color:"#666666",
                position:"25%"
            },{
                color:"#474747",
                position:"39%"
            },{
                color:"#2c2c2c",
                position:"50%"
            },{
                color:"#000000",
                position:"51%"
            },{
                color:"#111111",
                position:"60%"
            },{
                color:"#2b2b2b",
                position:"76%"
            },{
                color:"#1c1c1c",
                position:"91%"
            },{
                color:"#131313",
                position:"100%"
            }]
            },{
            name:"Blue 3D # 16",
            stops:[{
                color:"#87e0fd",
                position:"0%"
            },{
                color:"#53cbf1",
                position:"40%"
            },{
                color:"#05abe0",
                position:"100%"
            }]
            },{
            name:"Blue 3D #13",
            stops:[{
                color:"#f0f9ff",
                position:"0%"
            },{
                color:"#cbebff",
                position:"47%"
            },{
                color:"#a1dbff",
                position:"100%"
            }]
            },{
            name:"Blue 3D #14",
            stops:[{
                color:"#7abcff",
                position:"0%"
            },{
                color:"#60abf8",
                position:"44%"
            },{
                color:"#4096ee",
                position:"100%"
            }]
            },{
            name:"Blue to Transparent",
            stops:[{
                color:"#1E5799",
                position:"0%"
            },{
                color:"#7db9e8",
                position:"100%"
            }],
            opacityStops:[{
                opacity:1,
                position:"0%"
            },{
                opacity:0,
                position:"100%"
            }]
            },{
            name:"Blue to Transparent Sharp",
            stops:[{
                color:"#1E5799",
                position:"0%"
            },{
                color:"#7db9e8",
                position:"100%"
            }],
            opacityStops:[{
                opacity:1,
                position:"0%"
            },{
                opacity:1,
                position:"62%"
            },{
                opacity:0.7,
                position:"68%"
            },{
                opacity:0,
                position:"100%"
            }]
            },{
            name:"Blue Two Sided Transparent",
            stops:[{
                color:"#1E5799",
                position:"20%"
            },{
                color:"#2989D8",
                position:"50%"
            },{
                color:"#1E5799",
                position:"80%"
            }],
            opacityStops:[{
                opacity:0,
                position:"0%"
            },{
                opacity:0.8,
                position:"15%"
            },{
                opacity:1,
                position:"19%"
            },{
                opacity:1,
                position:"81%"
            },{
                opacity:0.8,
                position:"85%"
            },{
                opacity:0,
                position:"100%"
            }]
            },{
            name:"Neutral Density",
            stops:[{
                color:"#000000",
                position:"0%"
            },{
                color:"#000000",
                position:"100%"
            }],
            opacityStops:[{
                opacity:"0.65",
                position:"0%"
            },{
                opacity:"0",
                position:"100%"
            }]
            },{
            name:"White to Transparent",
            stops:[{
                color:"#ffffff",
                position:"0%"
            },{
                color:"#ffffff",
                position:"100%"
            }],
            opacityStops:[{
                opacity:"1",
                position:"0%"
            },{
                opacity:"0",
                position:"100%"
            }]
            },{
            name:"Blue 3D #15",
            stops:[{
                color:"#00b7ea",
                position:"0%"
            },{
                color:"#009ec3",
                position:"100%"
            }]
            },{
            name:"Blue 3D #17",
            stops:[{
                color:"#88bfe8",
                position:"0%"
            },{
                color:"#70b0e0",
                position:"100%"
            }]
            },{
            name:"Blue 3D #18",
            stops:[{
                color:"#feffff",
                position:"0%"
            },{
                color:"#ddf1f9",
                position:"35%"
            },{
                color:"#a0d8ef",
                position:"100%"
            }]
            },{
            name:"Blue Flat #1",
            stops:[{
                color:"#258dc8",
                position:"0%"
            },{
                color:"#258dc8",
                position:"100%"
            }]
            },{
            name:"Blue Flat #2",
            stops:[{
                color:"#4096ee",
                position:"0%"
            },{
                color:"#4096ee",
                position:"100%"
            }]
            },{
            name:"Blue Gloss #1",
            stops:[{
                color:"#b8e1fc",
                position:"0%"
            },{
                color:"#a9d2f3",
                position:"10%"
            },{
                color:"#90bae4",
                position:"25%"
            },{
                color:"#90bcea",
                position:"37%"
            },{
                color:"#90bff0",
                position:"50%"
            },{
                color:"#6ba8e5",
                position:"51%"
            },{
                color:"#a2daf5",
                position:"83%"
            },{
                color:"#bdf3fd",
                position:"100%"
            }]
            },{
            name:"Blue Gloss #2",
            stops:[{
                color:"#3b679e",
                position:"0%"
            },{
                color:"#2b88d9",
                position:"50%"
            },{
                color:"#207cca",
                position:"51%"
            },{
                color:"#7db9e8",
                position:"100%"
            }]
            },{
            name:"Blue Gloss #3",
            stops:[{
                color:"#6db3f2",
                position:"0%"
            },{
                color:"#54a3ee",
                position:"50%"
            },{
                color:"#3690f0",
                position:"51%"
            },{
                color:"#1e69de",
                position:"100%"
            }]
            },{
            name:"Blue Gloss #4",
            stops:[{
                color:"#ebf1f6",
                position:"0%"
            },{
                color:"#abd3ee",
                position:"50%"
            },{
                color:"#89c3eb",
                position:"51%"
            },{
                color:"#d5ebfb",
                position:"100%"
            }]
            },{
            name:"Blue Gloss #5",
            stops:[{
                color:"#e4f5fc",
                position:"0%"
            },{
                color:"#bfe8f9",
                position:"50%"
            },{
                color:"#9fd8ef",
                position:"51%"
            },{
                color:"#2ab0ed",
                position:"100%"
            }]
            },{
            name:"Blue Gloss",
            stops:[{
                color:"#cedbe9",
                position:"0%"
            },{
                color:"#aac5de",
                position:"17%"
            },{
                color:"#6199c7",
                position:"50%"
            },{
                color:"#3a84c3",
                position:"51%"
            },{
                color:"#419ad6",
                position:"59%"
            },{
                color:"#4bb8f0",
                position:"71%"
            },{
                color:"#3a8bc2",
                position:"84%"
            },{
                color:"#26558b",
                position:"100%"
            }]
            },{
            name:"Blue Grey 3D",
            stops:[{
                color:"#a7c7dc",
                position:"0%"
            },{
                color:"#85b2d3",
                position:"100%"
            }]
            },{
            name:"Blue Grey Flat",
            stops:[{
                color:"#3f4c6b",
                position:"0%"
            },{
                color:"#3f4c6b",
                position:"100%"
            }]
            },{
            name:"Blue Pipe #1",
            stops:[{
                color:"#d0e4f7",
                position:"0%"
            },{
                color:"#73b1e7",
                position:"24%"
            },{
                color:"#0a77d5",
                position:"50%"
            },{
                color:"#539fe1",
                position:"79%"
            },{
                color:"#87bcea",
                position:"100%"
            }]
            },{
            name:"Blue Pipe #2",
            stops:[{
                color:"#e1ffff",
                position:"0%"
            },{
                color:"#e1ffff",
                position:"7%"
            },{
                color:"#e1ffff",
                position:"12%"
            },{
                color:"#fdffff",
                position:"12%"
            },{
                color:"#e6f8fd",
                position:"30%"
            },{
                color:"#c8eefb",
                position:"54%"
            },{
                color:"#bee4f8",
                position:"75%"
            },{
                color:"#b1d8f5",
                position:"100%"
            }]
            },{
            name:"Blue Pipe",
            stops:[{
                color:"#b3dced",
                position:"0%"
            },{
                color:"#29b8e5",
                position:"50%"
            },{
                color:"#bce0ee",
                position:"100%"
            }]
            },{
            name:"Brown 3D",
            stops:[{
                color:"#d5cea6",
                position:"0%"
            },{
                color:"#c9c190",
                position:"40%"
            },{
                color:"#b7ad70",
                position:"100%"
            }]
            },{
            name:"Brown Gloss",
            stops:[{
                color:"#f0b7a1",
                position:"0%"
            },{
                color:"#8c3310",
                position:"50%"
            },{
                color:"#752201",
                position:"51%"
            },{
                color:"#bf6e4e",
                position:"100%"
            }]
            },{
            name:"Brown Red 3D",
            stops:[{
                color:"#a90329",
                position:"0%"
            },{
                color:"#8f0222",
                position:"44%"
            },{
                color:"#6d0019",
                position:"100%"
            }]
            },{
            name:"Gold 3D",
            stops:[{
                color:"#fefcea",
                position:"0%"
            },{
                color:"#f1da36",
                position:"100%"
            }]
            },{
            name:"Green 3D #1",
            stops:[{
                color:"#b4ddb4",
                position:"0%"
            },{
                color:"#83c783",
                position:"17%"
            },{
                color:"#52b152",
                position:"33%"
            },{
                color:"#008a00",
                position:"67%"
            },{
                color:"#005700",
                position:"83%"
            },{
                color:"#002400",
                position:"100%"
            }]
            },{
            name:"Green 3D #2",
            stops:[{
                color:"#cdeb8e",
                position:"0%"
            },{
                color:"#a5c956",
                position:"100%"
            }]
            },{
            name:"Green 3D #3",
            stops:[{
                color:"#c9de96",
                position:"0%"
            },{
                color:"#8ab66b",
                position:"44%"
            },{
                color:"#398235",
                position:"100%"
            }]
            },{
            name:"Green 3D #4",
            stops:[{
                color:"#f8ffe8",
                position:"0%"
            },{
                color:"#e3f5ab",
                position:"33%"
            },{
                color:"#b7df2d",
                position:"100%"
            }]
            },{
            name:"Green 3D #2",
            stops:[{
                color:"#a9db80",
                position:"0%"
            },{
                color:"#96c56f",
                position:"100%"
            }]
            },{
            name:"Green 3D",
            stops:[{
                color:"#b4e391",
                position:"0%"
            },{
                color:"#61c419",
                position:"50%"
            },{
                color:"#b4e391",
                position:"100%"
            }]
            },{
            name:"Green Flat #1",
            stops:[{
                color:"#299a0b",
                position:"0%"
            },{
                color:"#299a0b",
                position:"100%"
            }]
            },{
            name:"Green Flat #2",
            stops:[{
                color:"#8fc800",
                position:"0%"
            },{
                color:"#8fc800",
                position:"100%"
            }]
            },{
            name:"Green Flat #3",
            stops:[{
                color:"#006e2e",
                position:"0%"
            },{
                color:"#006e2e",
                position:"100%"
            }]
            },{
            name:"Green Flat #4",
            stops:[{
                color:"#6bba70",
                position:"0%"
            },{
                color:"#6bba70",
                position:"100%"
            }]
            },{
            name:"Green Flat #5",
            stops:[{
                color:"#cdeb8b",
                position:"0%"
            },{
                color:"#cdeb8b",
                position:"100%"
            }]
            },{
            name:"Green Flat #6",
            stops:[{
                color:"#8fc400",
                position:"0%"
            },{
                color:"#8fc400",
                position:"100%"
            }]
            },{
            name:"Green Flat",
            stops:[{
                color:"#b6e026",
                position:"0%"
            },{
                color:"#abdc28",
                position:"100%"
            }]
            },{
            name:"Green Gloss #1",
            stops:[{
                color:"#9dd53a",
                position:"0%"
            },{
                color:"#a1d54f",
                position:"50%"
            },{
                color:"#80c217",
                position:"51%"
            },{
                color:"#7cbc0a",
                position:"100%"
            }]
            },{
            name:"Green Gloss #2",
            stops:[{
                color:"#e6f0a3",
                position:"0%"
            },{
                color:"#d2e638",
                position:"50%"
            },{
                color:"#c3d825",
                position:"51%"
            },{
                color:"#dbf043",
                position:"100%"
            }]
            },{
            name:"Green Gloss",
            stops:[{
                color:"#bfd255",
                position:"0%"
            },{
                color:"#8eb92a",
                position:"50%"
            },{
                color:"#72aa00",
                position:"51%"
            },{
                color:"#9ecb2d",
                position:"100%"
            }]
            },{
            name:"Green Semi Flat",
            stops:[{
                color:"#b4df5b",
                position:"0%"
            },{
                color:"#b4df5b",
                position:"100%"
            }]
            },{
            name:"Gren 3D",
            stops:[{
                color:"#eeeeee",
                position:"0%"
            },{
                color:"#cccccc",
                position:"100%"
            }]
            },{
            name:"Grey 3D #1",
            stops:[{
                color:"#cedce7",
                position:"0%"
            },{
                color:"#596a72",
                position:"100%"
            }]
            },{
            name:"Grey 3D #2",
            stops:[{
                color:"#606c88",
                position:"0%"
            },{
                color:"#3f4c6b",
                position:"100%"
            }]
            },{
            name:"Grey 3D #3",
            stops:[{
                color:"#b0d4e3",
                position:"0%"
            },{
                color:"#88bacf",
                position:"100%"
            }]
            },{
            name:"Grey 3D #4",
            stops:[{
                color:"#f2f5f6",
                position:"0%"
            },{
                color:"#e3eaed",
                position:"37%"
            },{
                color:"#c8d7dc",
                position:"100%"
            }]
            },{
            name:"Grey 3D",
            stops:[{
                color:"#d8e0de",
                position:"0%"
            },{
                color:"#aebfbc",
                position:"22%"
            },{
                color:"#99afab",
                position:"33%"
            },{
                color:"#8ea6a2",
                position:"50%"
            },{
                color:"#829d98",
                position:"67%"
            },{
                color:"#4e5c5a",
                position:"82%"
            },{
                color:"#0e0e0e",
                position:"100%"
            }]
            },{
            name:"Grey Black 3D",
            stops:[{
                color:"#b5bdc8",
                position:"0%"
            },{
                color:"#828c95",
                position:"36%"
            },{
                color:"#28343b",
                position:"100%"
            }]
            },{
            name:"Grey Blue 3D #1",
            stops:[{
                color:"#b8c6df",
                position:"0%"
            },{
                color:"#6d88b7",
                position:"100%"
            }]
            },{
            name:"Grey Blue 3D",
            stops:[{
                color:"#cfe7fa",
                position:"0%"
            },{
                color:"#6393c1",
                position:"100%"
            }]
            },{
            name:"Grey Blue Gloss #1",
            stops:[{
                color:"#d2dfed",
                position:"0%"
            },{
                color:"#c8d7eb",
                position:"26%"
            },{
                color:"#bed0ea",
                position:"51%"
            },{
                color:"#a6c0e3",
                position:"51%"
            },{
                color:"#afc7e8",
                position:"62%"
            },{
                color:"#bad0ef",
                position:"75%"
            },{
                color:"#99b5db",
                position:"88%"
            },{
                color:"#799bc8",
                position:"100%"
            }]
            },{
            name:"Grey Flat",
            stops:[{
                color:"#eeeeee",
                position:"0%"
            },{
                color:"#eeeeee",
                position:"100%"
            }]
            },{
            name:"Grey Gloss #1",
            stops:[{
                color:"#e2e2e2",
                position:"0%"
            },{
                color:"#dbdbdb",
                position:"50%"
            },{
                color:"#d1d1d1",
                position:"51%"
            },{
                color:"#fefefe",
                position:"100%"
            }]
            },{
            name:"Grey Gloss #2",
            stops:[{
                color:"#f2f6f8",
                position:"0%"
            },{
                color:"#d8e1e7",
                position:"50%"
            },{
                color:"#b5c6d0",
                position:"51%"
            },{
                color:"#e0eff9",
                position:"100%"
            }]
            },{
            name:"Grey Gloss",
            stops:[{
                color:"#d4e4ef",
                position:"0%"
            },{
                color:"#86aecc",
                position:"100%"
            }]
            },{
            name:"Grey Pipe",
            stops:[{
                color:"#f5f6f6",
                position:"0%"
            },{
                color:"#dbdce2",
                position:"21%"
            },{
                color:"#b8bac6",
                position:"49%"
            },{
                color:"#dddfe3",
                position:"80%"
            },{
                color:"#f5f6f6",
                position:"100%"
            }]
            },{
            name:"L Brown 3D",
            stops:[{
                color:"#f3e2c7",
                position:"0%"
            },{
                color:"#c19e67",
                position:"50%"
            },{
                color:"#b68d4c",
                position:"51%"
            },{
                color:"#e9d4b3",
                position:"100%"
            }]
            },{
            name:"L Green 3D",
            stops:[{
                color:"#f9fcf7",
                position:"0%"
            },{
                color:"#f5f9f0",
                position:"100%"
            }]
            },{
            name:"Lavender 3D",
            stops:[{
                color:"#c3d9ff",
                position:"0%"
            },{
                color:"#b1c8ef",
                position:"41%"
            },{
                color:"#98b0d9",
                position:"100%"
            }]
            },{
            name:"Neon",
            stops:[{
                color:"#d2ff52",
                position:"0%"
            },{
                color:"#91e842",
                position:"100%"
            }]
            },{
            name:"Olive 3D #1",
            stops:[{
                color:"#fefefd",
                position:"0%"
            },{
                color:"#dce3c4",
                position:"42%"
            },{
                color:"#aebf76",
                position:"100%"
            }]
            },{
            name:"Olive 3D #2",
            stops:[{
                color:"#e4efc0",
                position:"0%"
            },{
                color:"#abbd73",
                position:"100%"
            }]
            },{
            name:"Olive 3D #3",
            stops:[{
                color:"#a4b357",
                position:"0%"
            },{
                color:"#75890c",
                position:"100%"
            }]
            },{
            name:"Olive 3D",
            stops:[{
                color:"#627d4d",
                position:"0%"
            },{
                color:"#1f3b08",
                position:"100%"
            }]
            },{
            name:"Olive Flat",
            stops:[{
                color:"#73880a",
                position:"0%"
            },{
                color:"#73880a",
                position:"100%"
            }]
            },{
            name:"Orange 3D #1",
            stops:[{
                color:"#ffaf4b",
                position:"0%"
            },{
                color:"#ff920a",
                position:"100%"
            }]
            },{
            name:"Orange 3D #2",
            stops:[{
                color:"#fac695",
                position:"0%"
            },{
                color:"#f5ab66",
                position:"47%"
            },{
                color:"#ef8d31",
                position:"100%"
            }]
            },{
            name:"Orange 3D #3",
            stops:[{
                color:"#ffc578",
                position:"0%"
            },{
                color:"#fb9d23",
                position:"100%"
            }]
            },{
            name:"Orange 3D #4",
            stops:[{
                color:"#f9c667",
                position:"0%"
            },{
                color:"#f79621",
                position:"100%"
            }]
            },{
            name:"Orange 3D #5",
            stops:[{
                color:"#fceabb",
                position:"0%"
            },{
                color:"#fccd4d",
                position:"50%"
            },{
                color:"#f8b500",
                position:"51%"
            },{
                color:"#fbdf93",
                position:"100%"
            }]
            },{
            name:"Orange 3D",
            stops:[{
                color:"#ffa84c",
                position:"0%"
            },{
                color:"#ff7b0d",
                position:"100%"
            }]
            },{
            name:"Orange Flat #1",
            stops:[{
                color:"#ff670f",
                position:"0%"
            },{
                color:"#ff670f",
                position:"100%"
            }]
            },{
            name:"Orange Flat",
            stops:[{
                color:"#ff7400",
                position:"0%"
            },{
                color:"#ff7400",
                position:"100%"
            }]
            },{
            name:"Orange Gloss",
            stops:[{
                color:"#ffb76b",
                position:"0%"
            },{
                color:"#ffa73d",
                position:"50%"
            },{
                color:"#ff7c00",
                position:"51%"
            },{
                color:"#ff7f04",
                position:"100%"
            }]
            },{
            name:"Pink 3D #1",
            stops:[{
                color:"#ff5db1",
                position:"0%"
            },{
                color:"#ef017c",
                position:"100%"
            }]
            },{
            name:"Pink 3D #2",
            stops:[{
                color:"#fb83fa",
                position:"0%"
            },{
                color:"#e93cec",
                position:"100%"
            }]
            },{
            name:"Pink 3D #3",
            stops:[{
                color:"#e570e7",
                position:"0%"
            },{
                color:"#c85ec7",
                position:"47%"
            },{
                color:"#a849a3",
                position:"100%"
            }]
            },{
            name:"Pink 3D",
            stops:[{
                color:"#cb60b3",
                position:"0%"
            },{
                color:"#ad1283",
                position:"50%"
            },{
                color:"#de47ac",
                position:"100%"
            }]
            },{
            name:"Pink Flat",
            stops:[{
                color:"#ff0084",
                position:"0%"
            },{
                color:"#ff0084",
                position:"100%"
            }]
            },{
            name:"Pink Gloss #2",
            stops:[{
                color:"#fcecfc",
                position:"0%"
            },{
                color:"#fba6e1",
                position:"50%"
            },{
                color:"#fd89d7",
                position:"51%"
            },{
                color:"#ff7cd8",
                position:"100%"
            }]
            },{
            name:"Pink Gloss",
            stops:[{
                color:"#cb60b3",
                position:"0%"
            },{
                color:"#c146a1",
                position:"50%"
            },{
                color:"#a80077",
                position:"51%"
            },{
                color:"#db36a4",
                position:"100%"
            }]
            },{
            name:"Purple 3D #1",
            stops:[{
                color:"#ebe9f9",
                position:"0%"
            },{
                color:"#d8d0ef",
                position:"50%"
            },{
                color:"#cec7ec",
                position:"51%"
            },{
                color:"#c1bfea",
                position:"100%"
            }]
            },{
            name:"Purple 3D",
            stops:[{
                color:"#8989ba",
                position:"0%"
            },{
                color:"#8989ba",
                position:"100%"
            }]
            },{
            name:"Red 3D #1",
            stops:[{
                color:"#febbbb",
                position:"0%"
            },{
                color:"#fe9090",
                position:"45%"
            },{
                color:"#ff5c5c",
                position:"100%"
            }]
            },{
            name:"Red 3D #2",
            stops:[{
                color:"#f2825b",
                position:"0%"
            },{
                color:"#e55b2b",
                position:"50%"
            },{
                color:"#f07146",
                position:"100%"
            }]
            },{
            name:"Red 3D",
            stops:[{
                color:"#ff3019",
                position:"0%"
            },{
                color:"#cf0404",
                position:"100%"
            }]
            },{
            name:"Red Flat #1",
            stops:[{
                color:"#ff1a00",
                position:"0%"
            },{
                color:"#ff1a00",
                position:"100%"
            }]
            },{
            name:"Red Flat",
            stops:[{
                color:"#cc0000",
                position:"0%"
            },{
                color:"#cc0000",
                position:"100%"
            }]
            },{
            name:"Red Gloss #1",
            stops:[{
                color:"#f85032",
                position:"0%"
            },{
                color:"#f16f5c",
                position:"50%"
            },{
                color:"#f6290c",
                position:"51%"
            },{
                color:"#f02f17",
                position:"71%"
            },{
                color:"#e73827",
                position:"100%"
            }]
            },{
            name:"Red Gloss #2",
            stops:[{
                color:"#feccb1",
                position:"0%"
            },{
                color:"#f17432",
                position:"50%"
            },{
                color:"#ea5507",
                position:"51%"
            },{
                color:"#fb955e",
                position:"100%"
            }]
            },{
            name:"Red Gloss #3",
            stops:[{
                color:"#efc5ca",
                position:"0%"
            },{
                color:"#d24b5a",
                position:"50%"
            },{
                color:"#ba2737",
                position:"51%"
            },{
                color:"#f18e99",
                position:"100%"
            }]
            },{
            name:"Red Gloss",
            stops:[{
                color:"#f3c5bd",
                position:"0%"
            },{
                color:"#e86c57",
                position:"50%"
            },{
                color:"#ea2803",
                position:"51%"
            },{
                color:"#ff6600",
                position:"75%"
            },{
                color:"#c72200",
                position:"100%"
            }]
            },{
            name:"Shape 1 Style",
            stops:[{
                color:"#b7deed",
                position:"0%"
            },{
                color:"#71ceef",
                position:"50%"
            },{
                color:"#21b4e2",
                position:"51%"
            },{
                color:"#b7deed",
                position:"100%"
            }]
            },{
            name:"Shape 2 Style",
            stops:[{
                color:"#e0f3fa",
                position:"0%"
            },{
                color:"#d8f0fc",
                position:"50%"
            },{
                color:"#b8e2f6",
                position:"51%"
            },{
                color:"#b6dffd",
                position:"100%"
            }]
            },{
            name:"Wax 3D #1",
            stops:[{
                color:"#feffe8",
                position:"0%"
            },{
                color:"#d6dbbf",
                position:"100%"
            }]
            },{
            name:"Wax 3D #2",
            stops:[{
                color:"#fcfff4",
                position:"0%"
            },{
                color:"#e9e9ce",
                position:"100%"
            }]
            },{
            name:"Wax 3D #3",
            stops:[{
                color:"#fcfff4",
                position:"0%"
            },{
                color:"#dfe5d7",
                position:"40%"
            },{
                color:"#b3bead",
                position:"100%"
            }]
            },{
            name:"Wax 3D",
            stops:[{
                color:"#e5e696",
                position:"0%"
            },{
                color:"#d1d360",
                position:"100%"
            }]
            },{
            name:"Wax Flat",
            stops:[{
                color:"#eaefb5",
                position:"0%"
            },{
                color:"#e1e9a0",
                position:"100%"
            }]
            },{
            name:"Black 3D #1",
            stops:[{
                color:"#45484d",
                position:"0%"
            },{
                color:"#000000",
                position:"100%"
            }]
            },{
            name:"Black 3D",
            stops:[{
                color:"#7d7e7d",
                position:"0%"
            },{
                color:"#0e0e0e",
                position:"100%"
            }]
            },{
            name:"Black Gloss Pipe",
            stops:[{
                color:"#959595",
                position:"0%"
            },{
                color:"#0d0d0d",
                position:"46%"
            },{
                color:"#010101",
                position:"50%"
            },{
                color:"#0a0a0a",
                position:"53%"
            },{
                color:"#4e4e4e",
                position:"76%"
            },{
                color:"#383838",
                position:"87%"
            },{
                color:"#1b1b1b",
                position:"100%"
            }]
            },{
            name:"Black Gloss",
            stops:[{
                color:"#aebcbf",
                position:"0%"
            },{
                color:"#6e7774",
                position:"50%"
            },{
                color:"#0a0e0a",
                position:"51%"
            },{
                color:"#0a0809",
                position:"100%"
            }]
            },{
            name:"Web 2.0 Blue 3D #1",
            stops:[{
                color:"#c5deea",
                position:"0%"
            },{
                color:"#8abbd7",
                position:"31%"
            },{
                color:"#066dab",
                position:"100%"
            }]
            },{
            name:"Blue 3D #1",
            stops:[{
                color:"#f7fbfc",
                position:"0%"
            },{
                color:"#d9edf2",
                position:"40%"
            },{
                color:"#add9e4",
                position:"100%"
            }]
            },{
            name:"Blue 3D",
            stops:[{
                color:"#d6f9ff",
                position:"0%"
            },{
                color:"#9ee8fa",
                position:"100%"
            }]
            },{
            name:"Blue 3D #3",
            stops:[{
                color:"#e9f6fd",
                position:"0%"
            },{
                color:"#d3eefb",
                position:"100%"
            }]
            },{
            name:"Blue 3D #4",
            stops:[{
                color:"#63b6db",
                position:"0%"
            },{
                color:"#309dcf",
                position:"100%"
            }]
            },{
            name:"Blue 3D #2",
            stops:[{
                color:"#2c539e",
                position:"0%"
            },{
                color:"#2c539e",
                position:"100%"
            }]
            },{
            name:"Ble 3D #5",
            stops:[{
                color:"#a9e4f7",
                position:"0%"
            },{
                color:"#0fb4e7",
                position:"100%"
            }]
            },{
            name:"Blue 3D #5",
            stops:[{
                color:"#93cede",
                position:"0%"
            },{
                color:"#75bdd1",
                position:"41%"
            },{
                color:"#49a5bf",
                position:"100%"
            }]
            },{
            name:"Blue 3D #6",
            stops:[{
                color:"#b2e1ff",
                position:"0%"
            },{
                color:"#66b6fc",
                position:"100%"
            }]
            },{
            name:"Blue 3D #9",
            stops:[{
                color:"#4f85bb",
                position:"0%"
            },{
                color:"#4f85bb",
                position:"100%"
            }]
            },{
            name:"Blue 3D #10",
            stops:[{
                color:"#deefff",
                position:"0%"
            },{
                color:"#98bede",
                position:"100%"
            }]
            },{
            name:"Blue 3D #11",
            stops:[{
                color:"#49c0f0",
                position:"0%"
            },{
                color:"#2cafe3",
                position:"100%"
            }]
            },{
            name:"Blue 3D #12",
            stops:[{
                color:"#feffff",
                position:"0%"
            },{
                color:"#d2ebf9",
                position:"100%"
            }]
            },{
            name:"Blue 3d #8",
            stops:[{
                color:"#a7cfdf",
                position:"0%"
            },{
                color:"#23538a",
                position:"100%"
            }]
            },{
            name:"Blue 3d #7",
            stops:[{
                color:"#499bea",
                position:"0%"
            },{
                color:"#207ce5",
                position:"100%"
            }]
            },{
            name:"Blue Flat",
            stops:[{
                color:"#356aa0",
                position:"0%"
            },{
                color:"#356aa0",
                position:"100%"
            }]
            },{
            name:"White 3D #1",
            stops:[{
                color:"#ffffff",
                position:"0%"
            },{
                color:"#f6f6f6",
                position:"47%"
            },{
                color:"#ededed",
                position:"100%"
            }]
            },{
            name:"White 3D #2",
            stops:[{
                color:"#f2f9fe",
                position:"0%"
            },{
                color:"#d6f0fd",
                position:"100%"
            }]
            },{
            name:"White 3D",
            stops:[{
                color:"#ffffff",
                position:"0%"
            },{
                color:"#e5e5e5",
                position:"100%"
            }]
            },{
            name:"White Gloss #1",
            stops:[{
                color:"#ffffff",
                position:"0%"
            },{
                color:"#f1f1f1",
                position:"50%"
            },{
                color:"#e1e1e1",
                position:"51%"
            },{
                color:"#f6f6f6",
                position:"100%"
            }]
            },{
            name:"White Gloss #2",
            stops:[{
                color:"#ffffff",
                position:"0%"
            },{
                color:"#f3f3f3",
                position:"50%"
            },{
                color:"#ededed",
                position:"51%"
            },{
                color:"#ffffff",
                position:"100%"
            }]
            },{
            name:"White Gloss",
            stops:[{
                color:"#f6f8f9",
                position:"0%"
            },{
                color:"#e5ebee",
                position:"50%"
            },{
                color:"#d7dee3",
                position:"51%"
            },{
                color:"#f5f7f9",
                position:"100%"
            }]
            },{
            name:"Yellow 3D #1",
            stops:[{
                color:"#f6e6b4",
                position:"0%"
            },{
                color:"#ed9017",
                position:"100%"
            }]
            },{
            name:"Yellow 3D #2",
            stops:[{
                color:"#eab92d",
                position:"0%"
            },{
                color:"#c79810",
                position:"100%"
            }]
            },{
            name:"Yellow 3D #2",
            stops:[{
                color:"#ffd65e",
                position:"0%"
            },{
                color:"#febf04",
                position:"100%"
            }]
            },{
            name:"Yellow 3D",
            stops:[{
                color:"#f1e767",
                position:"0%"
            },{
                color:"#feb645",
                position:"100%"
            }]
            },{
            name:"Yellow Flat #1",
            stops:[{
                color:"#ffff88",
                position:"0%"
            },{
                color:"#ffff88",
                position:"100%"
            }]
            },{
            name:"Yellow Flat",
            stops:[{
                color:"#febf01",
                position:"0%"
            },{
                color:"#febf01",
                position:"100%"
            }]
            }]
        }
    };

Gradient.DB.Default=Gradient.DB.UltimateWeb2;/*
 
 CSS Gradient Editor
 
 Written by Alex Sirota (alex @ iosart.com)

 Copyright (c) Alex Sirota 2010, All Rights Reserved

 Please do not use without permission

*/
if(typeof Gradient=="undefined"){
    var Gradient={}
}
Gradient.Editor=function(a){
    var b=this;
    if(navigator.appVersion.indexOf("Mac")!=-1){
        $$("body")[0].addClassName("macos")
        }
        this.gradientControl=$(a);
    this.gradientPanelElem=this.gradientControl.select(".gradient-panel")[0];
    this.gradientMarkersContainerElem=this.gradientControl.select(".stop-markers-color")[0];
    this.gradientMarkerDeleterElem=this.gradientControl.select(".stop-markers-color-deleter")[0];
    this.stopDetailsPanel=this.gradientControl.select(".stop-details-color")[0];
    var f={
        gradientEditor:this,
        gradientControl:this.gradientControl,
        gradientPanelElem:this.gradientPanelElem,
        gradientMarkersContainerElem:this.gradientMarkersContainerElem,
        gradientMarkerDeleterElem:this.gradientMarkerDeleterElem,
        stopDetailsPanel:this.stopDetailsPanel,
        onStopActivatedCallback:this.onStopActivated.bind(this)
        };
        
    this.colorStopsHandler=new Gradient.StopsHandler("color",f);
    this.gradientOpacityMarkersContainerElem=this.gradientControl.select(".stop-markers-opacity")[0];
    this.gradientOpacityMarkerDeleterElem=this.gradientControl.select(".stop-markers-opacity-deleter")[0];
    this.opacityStopDetailsPanel=this.gradientControl.select(".stop-details-opacity")[0];
    var f={
        gradientEditor:this,
        gradientControl:this.gradientControl,
        gradientPanelElem:this.gradientPanelElem,
        gradientMarkersContainerElem:this.gradientOpacityMarkersContainerElem,
        gradientMarkerDeleterElem:this.gradientOpacityMarkerDeleterElem,
        stopDetailsPanel:this.opacityStopDetailsPanel,
        onStopActivatedCallback:this.onStopActivated.bind(this)
        };
        
    this.opacityStopsHandler=new Gradient.StopsHandler("opacity",f);
    this.cssTextElem=this.gradientControl.select(".css-output-text")[0];
    this.cssNotesElem=this.gradientControl.select(".css-notes")[0];
    this.cssNotesTextElem=this.cssNotesElem.select(".css-notes-text")[0];
    this.cssNotesCloseButton=this.cssNotesElem.select(".small-close-button")[0];
    this.cssNotesCloseButton.observe("click",function(){
        b.cssNotesElem.hide()
        });
    this.previewBackgroundElem=this.gradientControl.select(".preview-panel-background")[0];
    this.previewElem=this.gradientControl.select(".preview-panel")[0];
    this.orientationSelectorElem=this.gradientControl.select(".output-options .orientation")[0];
    this.previewDimensionWidthElem=this.gradientControl.select(".output-options .dimension-width")[0];
    this.previewDimensionHeightElem=this.gradientControl.select(".output-options .dimension-height")[0];
    this.previewAsIECheckboxElem=this.gradientControl.select(".output-options input.preview-as-ie")[0];
    this.presetsContainerElem=this.gradientControl.select(".presets .presets-container")[0];
    this.gradientNameBoxElem=this.gradientControl.select(".gradient-name .name-input")[0];
    this.saveNewPresetButtonElem=this.gradientControl.select(".gradient-name .save-new-preset")[0];
    this.colorFormatSelectorElem=this.gradientControl.select(".css-options .color-format")[0];
    this.includeCSSCommentsCheckboxElem=this.gradientControl.select(".css-options input.css-comments")[0];
    this.colorPickerElem=$("colorpicker-1");
    this.gradientPanelElemWidth=Element.getWidth(this.gradientPanelElem);
    this.gradientPanelElemWidth-=2;
    this.cssTextElem.observe("dblclick",function(){
        Gradient.Utils.selectTextInNode(b.cssTextElem)
        });
    this.orientationSelectorElem.observe("change",this.onOrientationSelectorChange.bind(this));
    this.previewDimensionWidthElem.observe("change",this.onPreviewDimensionsChange.bind(this));
    this.previewDimensionHeightElem.observe("change",this.onPreviewDimensionsChange.bind(this));
    this.previewAsIECheckboxElem.observe("change",this.onPreviewAsIECheckboxChange.bind(this));
    this.colorFormatSelectorElem.observe("change",this.onColorFormatSelectorChange.bind(this));
    this.includeCSSCommentsCheckboxElem.observe("change",this.onIncludeCSSCommentsCheckboxChange.bind(this));
    this.saveNewPresetButtonElem.observe("click",this.onSaveNewPresetButtonClick.bind(this));
    this.importFromCSSButton=this.gradientControl.select("button.import-css")[0];
    this.importFromCSSButton.observe("click",this.onImportFromCSSButtonClicked.bind(this));
    this.importFromCSSPanel=this.gradientControl.select(".import-css-input-panel")[0];
    this.importFromCSSPanelOkButton=this.gradientControl.select(".import-css-input-panel button.ok")[0];
    this.importFromCSSPanelOkButton.observe("click",this.onImportFromCSSPanelOkButtonClick.bind(this));
    this.importFromCSSPanelCancelButton=this.gradientControl.select(".import-css-input-panel button.cancel")[0];
    this.importFromCSSPanelCancelButton.observe("click",this.onImportFromCSSPanelCancelButtonClick.bind(this));
    this.importFromCSSTextElem=this.gradientControl.select(".import-css-input-panel .import-css-text")[0];
    this.importFromImageButton=this.gradientControl.select("button.import-image")[0];
    this.importFromImageButton.observe("click",this.onImportFromImageButtonClicked.bind(this));
    this.importFromImagePanel=this.gradientControl.select(".import-image-input-panel")[0];
    this.importFromImageForm=this.gradientControl.select(".import-image-form")[0];
    this.importFromImagePanelOkButton=this.gradientControl.select(".import-image-input-panel button.ok")[0];
    this.importFromImagePanelOkButton.observe("click",this.onImportFromImagePanelOkButtonClick.bind(this));
    this.importFromImagePanelCancelButton=this.gradientControl.select(".import-image-input-panel button.cancel")[0];
    this.importFromImagePanelCancelButton.observe("click",this.onImportFromImagePanelCancelButtonClick.bind(this));
    this.importFromImageFileInputElem=this.gradientControl.select(".import-image-input-panel input.import-image-file-input")[0];
    this.importFromImageURLInputElem=this.gradientControl.select(".import-image-input-panel input.import-image-url-input")[0];
    this.permalinkElem=this.gradientControl.select(".permalink-panel .permalink")[0];
    this.cssImporter=null;
    this.lastUsedColor="#ffffff";
    this.outputOrientation=ColorZilla.Persist.get("output-orientation","vertical");
    this.orientationSelectorElem.value=this.outputOrientation;
    this.previewDimensionsWidth=ColorZilla.Persist.get("preview-width","350");
    this.previewDimensionsHeight=ColorZilla.Persist.get("preview-height","50");
    this.previewDimensionWidthElem.value=this.previewDimensionsWidth;
    this.previewDimensionHeightElem.value=this.previewDimensionsHeight;
    this.previewAsIE=false;
    this.cssColorFormat=ColorZilla.Persist.get("css-color-format","hex");
    this.colorFormatSelectorElem.value=this.cssColorFormat;
    this.includeCSSComments=(ColorZilla.Persist.get("include-css-comments","true")=="true");
    this.includeCSSCommentsCheckboxElem.checked=this.includeCSSComments;
    this.switchToPresetSet("Default");
    this.userGradientPresets=Gradient.UserPresets.get();
    this.userGradientPresetsIDCounter=this.userGradientPresets.length;
    this.addUserPresets(this.userGradientPresets);
    function e(){
        Refresh.Web.DefaultColorPickerSettings.clientFilesPath="../colorpicker/images/";
        b.colorPicker=new Refresh.Web.ColorPicker("cp1",{
            startHex:"ffcc00",
            startMode:"s"
        });
        b.colorPicker.updateColorZilla=function(){
            var j=Refresh.Web.ColorMethods.normalizeHex($("cp1_Hex").value);
            b.colorStopsHandler.changeActiveStopValue("#"+j)
            };
            
        b.colorPickerDialogWin=new Window({
            top:170,
            left:400,
            maximizable:false,
            resizable:false,
            minimizable:false,
            hideEffect:Element.hide,
            showEffect:Element.show
            });
        b.colorPickerDialogWin.setContent("colorpicker-1",true,false);
        var i=b.colorPickerElem.select(".dialog-button.ok-button")[0];
        var h=b.colorPickerElem.select(".dialog-button.cancel-button")[0];
        i.observe("click",function(){
            b.invalidateCurrentPreset();
            var j=Refresh.Web.ColorMethods.normalizeHex($("cp1_Hex").value);
            b.lastUsedColor="#"+j;
            b.colorPickerDialogWin.close()
            });
        h.observe("click",function(){
            b.colorPickerDialogWin.close()
            });
        Event.observe(window,"keypress",function(j){
            if((j.keyCode==Event.KEY_ESC)&&b.colorPickerDialogWin.visible){
                b.colorPickerDialogWin.close()
                }
            });
    myObserver={
        onClose:function(j,k){
            if(k==b.colorPickerDialogWin){
                b.colorStopsHandler.changeActiveStopValue(b.lastUsedColor)
                }
            }
    };

Windows.addObserver(myObserver);
var g=[{
    name:"Save Current Gradient",
    callback:function(j){
        b.onSaveNewPresetButtonClick()
        },
    className:"new-preset"
},{
    name:"Delete Gradient",
    callback:function(j){
        b.deleteUserPreset(j.contextMenuElement)
        },
    className:"delete-preset"
},];
new Proto.Menu({
    beforeShow:function(k){
        var j=k.contextMenuContainerElement.select(".delete-preset")[0];
        if(!k.contextMenuElement.hasClassName("user-preset")){
            j.addClassName("disabled");
            j.removeClassName("enabled")
            }else{
            j.addClassName("enabled");
            j.removeClassName("disabled")
            }
        },
selector:".has-preset-contextmenu",
className:"menu desktop preset-context-menu",
menuItems:g
})
}
setTimeout(e,10);
setTimeout(function(){
    b.gradientAdjuster=new Gradient.Adjustments(b)
    },10);
var c=this.getGradientFromPermalinkHash(window.location.hash);
var d;
if(c){
    d=c
    }else{
    if(this.userGradientPresets.length>0){
        d=this.userGradientPresets[this.userGradientPresets.length-1]
        }else{
        d=Gradient.DB.Default.gradients[0]
        }
    }
this.setCurrentPreset(d.name,Gradient.Utils.deepClone(d.stops),Gradient.Utils.deepClone(this.getGradientPresetOpacityStops(d)));
Event.observe(window,"hashchange",this.onHashChanged.bind(this))
};

Gradient.Editor.prototype={
    cssGradientsSupported:function(){
        var b="background-image:gradient(linear,left top,right bottom,from(#222),to(#444));background-image:-o-gradient(linear,left top,right bottom,from(#222),to(#444));background-image:-moz-gradient(linear,left top,right bottom,from(#222),to(#444));background-image:-ms-gradient(linear,left top,right bottom,from(#222),to(#444));background-image:-webkit-gradient(linear,left top,right bottom,from(#222),to(#444));background-image:-khtml-gradient(linear,left top,right bottom,from(#222),to(#444));background-image:linear-gradient(left top,#222, #444);background-image:-o-linear-gradient(left top,#222, #444);background-image:-moz-linear-gradient(left top,#222, #444);background-image:-ms-linear-gradient(left top,#222, #444);background-image:-webkit-linear-gradient(left top,#222, #444);background-image:-khtml-linear-gradient(left top,#222, #444);";
        var a=document.createElement("div");
        a.style.cssText=b;
        return a.style.backgroundImage.indexOf("gradient")!==-1
        },
    formatCSSColor:function(a,c,d){
        if((d=="hex")||((d=="iehex")&&(c==1))){
            return a.toLowerCase()
            }
            if(d=="iehex"){
            a=a.toLowerCase();
            if(a.substr(0,1)=="#"){
                a=a.substring(1)
                }
                c=Math.round(c*255);
            c=Gradient.Utils.decimalToHexa(c);
            return"#"+c+a
            }
            var b=Gradient.Utils.hexaToRGB(a);
        if(d=="rgb"){
            return Gradient.Utils.rbgToRGBCSS(b)
            }
            if(d=="rgba"){
            return Gradient.Utils.rbgAndAlphaToRGBACSS(b,c)
            }
            if(d=="hsl"){
            return Gradient.Utils.rgbToHSLCSS(b)
            }
            if(d=="hsla"){
            return Gradient.Utils.rgbToHSLCSS(b,c)
            }
            return a
        },
    generateCSSRules:function(g,e,q){
        var j=g;
        if(typeof(e)=="undefined"){
            e="horizontal"
            }
            if(typeof(q)=="undefined"){
            q="hex"
            }
            var n,a,d,c;
        switch(e){
            case"horizontal":
                n="left top, right top";
                a="left";
                d="GradientType=1";
                c="left";
                break;
            case"vertical":
                n="left top, left bottom";
                a="top";
                d="GradientType=0";
                c="top";
                break;
            case"diagonal":
                n="left top, right bottom";
                a="-45deg";
                d="GradientType=0";
                c="-45deg";
                break
                }
                var s=(q=="rgba")?"rgb":((q!="hex")&&(q!="rgb")?"hex":q);
        var h=this.formatCSSColor(j[0].color,1,s);
        var m=[];
        var b=[];
        var l=[];
        ieCSS="startColorstr='"+this.formatCSSColor(j[0].color,j[0].opacity,"iehex")+"', endColorstr='"+this.formatCSSColor(j[j.length-1].color,j[j.length-1].opacity,"iehex")+"'";
        for(var r=0;r<j.length;r++){
            var p=this.formatCSSColor(j[r].color,j[r].opacity,q);
            var t=j[r].position;
            m.push(p+" "+t);
            b.push("color-stop("+t+","+p+")")
            }
            var u=m;
        var k=a;
        var l=u;
        m=m.join(", ");
        m="-moz-linear-gradient("+a+",  "+m+")";
        b=b.join(", ");
        b="-webkit-gradient(linear, "+n+", "+b+")";
        ieCSS="progid:DXImageTransform.Microsoft.gradient( "+ieCSS+","+d+" )";
        l="-o-linear-gradient("+c+",  "+l+")";
        var o="-webkit-linear-gradient("+k+",  "+u+")";
        var f="-ms-linear-gradient("+k+",  "+u+")";
        var u="linear-gradient("+k+",  "+u+")";
        return{
            solid:h,
            moz:m,
            webkit:b,
            newWebkit:o,
            ie:ieCSS,
            ieCSS3:f,
            opera:l,
            w3Standard:u
        }
    },
setElementGradientBackground:function(b,a){
    try{
        b.style.background=a.solid
        }catch(c){}
    try{
        b.style.background=a.moz
        }catch(c){}
    try{
        b.style.background=a.webkit
        }catch(c){}
    try{
        b.style.background=a.newWebkit
        }catch(c){}
    try{
        b.style.background=a.opera
        }catch(c){}
    try{
        b.style.background=a.ieCSS3
        }catch(c){}
    try{
        b.style.filter=a.ie
        }catch(c){}
    try{
        b.style.background=a.w3Standard
        }catch(c){}
},
setColorStops:function(a){
    this.colorStopsHandler.setStops(a);
    this.updateAllUI()
    },
setAllStops:function(b,a){
    this.colorStopsHandler.setStops(b);
    if((typeof a=="undefined")||(!a)){
        this.opacityStopsHandler.setStops(this.opacityStopsHandler.defaultStops)
        }else{
        this.opacityStopsHandler.setStops(a)
        }
        this.updateAllUI()
    },
getColorStops:function(){
    return this.colorStopsHandler.getStops()
    },
getOpacityStops:function(){
    return this.opacityStopsHandler.getStops()
    },
currentGradientHasOpacity:function(){
    var a=this.getOpacityStops();
    return Gradient.StopUtils.gradientHasOpacity({
        stops:a
    })
    },
getMergedStops:function(){
    if(this.currentGradientHasOpacity()){
        return Gradient.StopUtils.mergeStops(this.getColorStops(),this.getOpacityStops())
        }else{
        var b=Gradient.Utils.deepClone(this.getColorStops());
        for(var a=0;a<b.length;a++){
            b[a].opacity=1
            }
            return b
        }
    },
getGradientPresetOpacityStops:function(a){
    return"opacityStops" in a?a.opacityStops:this.opacityStopsHandler.defaultStops
    },
setNewStopColor:function(a){
    this.lastUsedColor=a
    },
updateAllUI:function(){
    this.mergedStops=this.getMergedStops();
    this.updateGradientPanel();
    this.colorStopsHandler.updateStopMarkers();
    this.opacityStopsHandler.updateStopMarkers();
    this.switchToOpacitySupportingColorModeIfNeeded();
    this.cssRules=this.generateCSSRules(this.mergedStops,this.outputOrientation,this.cssColorFormat);
    this.updateCSSOutput();
    this.updatePreviewElement();
    this.updatePermalink()
    },
switchToOpacitySupportingColorModeIfNeeded:function(){
    if(this.currentGradientHasOpacity()&&(this.cssColorFormat!="rgba")&&(this.cssColorFormat!="hsla")){
        this.cssColorFormat=this.cssColorFormat=="hsl"?"hsla":"rgba";
        this.colorFormatSelectorElem.value=this.cssColorFormat;
        this.cssNotesTextElem.innerHTML="Current gradient has opacity, switching color format to '"+this.cssColorFormat+"'";
        this.cssNotesElem.show();
        ColorZilla.Persist.set("css-color-format",this.cssColorFormat)
        }
    },
updatePermalink:function(){
    var a=this.currentGradientToHash();
    this.permalinkElem.setAttribute("href","#"+a)
    },
updateGradientPanel:function(){
    var b=this.mergedStops;
    var a=this.generateCSSRules(b,"horizontal","rgba");
    this.setElementGradientBackground(this.gradientPanelElem,a)
    },
updateCSSOutput:function(){
    var b=this.cssRules;
    var a=[];
    if(!this.currentGradientHasOpacity()){
        a.push("background: "+b.solid+";"+(this.includeCSSComments?" /* Old browsers */":""))
        }
        a.push("background: "+b.moz+";"+(this.includeCSSComments?" /* FF3.6+ */":""));
    a.push("background: "+b.webkit+";"+(this.includeCSSComments?" /* Chrome,Safari4+ */":""));
    a.push("background: "+b.newWebkit+";"+(this.includeCSSComments?" /* Chrome10+,Safari5.1+ */":""));
    a.push("background: "+b.opera+";"+(this.includeCSSComments?" /* Opera11.10+ */":""));
    a.push("background: "+b.ieCSS3+";"+(this.includeCSSComments?" /* IE10+ */":""));
    a.push("filter: "+b.ie+";"+(this.includeCSSComments?" /* IE6-9 */":""));
    a.push("background: "+b.w3Standard+";"+(this.includeCSSComments?" /* W3C */":""));
    this.cssTextElem.innerHTML="<div>"+a.join("</div><div>")+"</div>"
    },
updatePreviewElement:function(){
    var b;
    if(!this.previewAsIE){
        b=this.cssRules
        }else{
        var c=this.getMergedStops();
        var a=[c[0],c[c.length-1]];
        b=this.generateCSSRules(a,this.outputOrientation,"rgba")
        }
        this.setElementGradientBackground(this.previewElem,b);
    this.previewBackgroundElem.style.width=this.previewDimensionsWidth+"px";
    this.previewBackgroundElem.style.height=this.previewDimensionsHeight+"px"
    },
setLastUsedColorFromCurrentGradient:function(){
    var a=this.getColorStops();
    this.lastUsedColor=a[0].color
    },
onHashChanged:function(){
    var b=window.location.hash;
    if(!b||(b=="#")){
        return
    }
    var a=this.getGradientFromPermalinkHash(b);
    if(!a){
        return
    }
    this.setCurrentPreset(a.name,Gradient.Utils.deepClone(a.stops),Gradient.Utils.deepClone(this.getGradientPresetOpacityStops(a)))
    },
resetURLHash:function(){
    var a=window.location.hash;
    if(a&&(a.length>6)){
        window.location.hash="#_"
        }
    },
getGradientFromPermalinkHash:function(f){
    if(!f||!f.match(/,/)){
        return null
        }
        if(f.substr(0,1)=="#"){
        f=f.substring(1)
        }
        var d=f.split(";");
    var a=d.length>1?decodeURIComponent(d[1]):"Custom";
    a=a.replace(/\+/g," ");
    a=a.replace(/[^0-9a-zA-Z \-_\.#]/g," ");
    var b=d[0];
    var n=b.split("&");
    b=n[0];
    var k=(n.length==2)?n[1]:null;
    var j=b.split(",");
    var p=[];
    for(var e=0;e<j.length;e++){
        var m=j[e].split("+");
        var c=m[0];
        if(!c.match(/^[0-9a-fA-F]{6}$/)){
            c="ffffff"
            }
            c="#"+c;
        var l=m[1];
        if(!l.match(/^\d{1,3}$/)){
            l="0"
            }
            l+="%";
        p.push({
            color:c,
            position:l
        })
        }
        var g=null;
    if(k){
        var j=k.split(",");
        g=[];
        for(var e=0;e<j.length;e++){
            var m=j[e].split("+");
            var h=m[0];
            if(!h.match(/^[0-9\.]+$/)){
                h=1
                }
                var l=m[1];
            if(!l.match(/^\d{1,3}$/)){
                l="0"
                }
                l+="%";
            g.push({
                opacity:h,
                position:l
            })
            }
        }
        var o={
    name:a,
    stops:p
};

if(g){
    o.opacityStops=g
    }
    return o
},
currentGradientToHash:function(){
    var c=[];
    var j=this.getColorStops();
    for(var e=0;e<j.length;e++){
        var h=j[e];
        var b=h.color.toLowerCase();
        if(b.substr(0,1)=="#"){
            b=b.substring(1)
            }
            var g=parseInt(h.position);
        c.push(b+"+"+g)
        }
        var d=c.join(",");
    if(this.currentGradientHasOpacity()){
        var c=[];
        var j=this.getOpacityStops();
        for(var e=0;e<j.length;e++){
            var h=j[e];
            var f=h.opacity;
            var g=parseInt(h.position);
            c.push(f+"+"+g)
            }
            d+="&"+c.join(",")
        }
        var a=encodeURIComponent(this.getCurrentPresetName());
    a=a.replace(/%20/g,"+");
    d+=";"+a;
    return d
    },
openColorPickerAndGetColor:function(b){
    var a=window.prompt("Enter new color");
    if(a!==null){
        b(a)
        }
    },
openColorPicker:function(a,c){
    this.colorPickerDialogWin.show(true);
    $("cp1_Hex").focus();
    var b=this.lastUsedColor.substring(1);
    this.colorPicker._cvp._hexInput.value=b;
    this.colorPicker._cvp.setValuesFromHex();
    this.colorPicker.positionMapAndSliderArrows();
    this.colorPicker.updateVisuals()
    },
switchToPresetSet:function(b){
    this.clearPresets();
    var a=Gradient.DB[b];
    if(typeof(a)=="undefined"){
        return
    }
    if(typeof(a.license)!="undefined"){}
    for(var c=0;c<a.gradients.length;c++){
        this.addPreset(a.gradients[c])
        }
    },
addUserPresets:function(a){
    for(var b=0;b<a.length;b++){
        this.addPreset(a[b],true,true)
        }
    },
clearPresets:function(){
    var a=this.presetsContainerElem;
    if(!a.hasChildNodes()){
        return
    }while(a.childNodes.length>=1){
        a.removeChild(a.firstChild)
        }
    },
addPreset:function(i,l,d){
    var j=i.stops;
    var a=i.name;
    var c=this.getGradientPresetOpacityStops(i);
    var e=document.createElement("div");
    e.className="preset-item-background gradient-background";
    var b=document.createElement("div");
    var g="preset-item  has-preset-contextmenu";
    if(d){
        g+=" user-preset";
        if("uniqueID" in i){
            b.setAttribute("preset-id",i.uniqueID)
            }
        }
    b.className=g;
var k=Gradient.StopUtils.mergeStops(j,c);
var f=this.generateCSSRules(k,"diagonal","rgba");
this.setElementGradientBackground(b,f);
var h=this;
var j=j.toJSON();
var c=c.toJSON();
Element.extend(b);
b.observe("click",function(m){
    if(!Event.isLeftClick(m)){
        return
    }
    h.resetURLHash();
    h.setCurrentPreset(a,j.evalJSON(true),c.evalJSON(true))
    });
e.appendChild(b);
if(!l||!this.presetsContainerElem.firstChild){
    this.presetsContainerElem.appendChild(e)
    }else{
    this.presetsContainerElem.insertBefore(e,this.presetsContainerElem.firstChild)
    }
},
deletePreset:function(b){
    var a=b.up(".preset-item-background");
    a.parentNode.removeChild(a)
    },
deleteUserPreset:function(d){
    this.deletePreset(d);
    var c=d.getAttribute("preset-id");
    var b=[];
    for(var a=0;a<this.userGradientPresets.length;a++){
        if(c!=this.userGradientPresets[a].uniqueID){
            b.push(this.userGradientPresets[a])
            }
        }
    this.userGradientPresets=b;
Gradient.UserPresets.persist(this.userGradientPresets)
},
getCurrentPresetName:function(a){
    return this.gradientNameBoxElem.value
    },
setPresetName:function(a){
    this.gradientNameBoxElem.value=a
    },
setCurrentPreset:function(b,c,a){
    this.setPresetName(b);
    this.setAllStops(c,a);
    if(this.gradientAdjuster){
        this.gradientAdjuster.resetAllAdjustments()
        }
        this.setLastUsedColorFromCurrentGradient()
    },
invalidateCurrentPreset:function(a){
    this.setPresetName("Custom");
    this.resetURLHash();
    if(!a&&this.gradientAdjuster){
        this.gradientAdjuster.resetAllAdjustments()
        }
    },
saveNewPreset:function(){
    var a={
        name:this.getCurrentPresetName(),
        stops:this.getColorStops()
        };
        
    if(this.currentGradientHasOpacity()){
        a.opacityStops=this.getOpacityStops()
        }
        a.uniqueID=this.userGradientPresetsIDCounter;
    this.userGradientPresetsIDCounter++;
    this.addPreset(a,true,true);
    a=Gradient.Utils.deepClone(a);
    this.userGradientPresets.push(a);
    Gradient.UserPresets.persist(this.userGradientPresets)
    },
toggleImportCSSPanel:function(){
    this.showHideImportImagePanel(false);
    Element.toggle(this.importFromCSSPanel)
    },
toggleImportImagePanel:function(){
    this.showHideImportCSSPanel(false);
    Element.toggle(this.importFromImagePanel)
    },
showHideImportPanel:function(b,a){
    if(a){
        Element.show(b)
        }else{
        Element.hide(b)
        }
    },
showHideImportCSSPanel:function(a){
    this.showHideImportPanel(this.importFromCSSPanel,a)
    },
showHideImportImagePanel:function(a){
    this.showHideImportPanel(this.importFromImagePanel,a)
    },
exportToImageDataURL:function(){
    var a=this.previewDimensionsWidth;
    var l=this.previewDimensionsHeight;
    var c=document.createElement("canvas");
    c.setAttribute("width",a);
    c.setAttribute("height",l);
    var m=c.getContext("2d");
    var j=this.outputOrientation=="horizontal"?a:0;
    var h=this.outputOrientation=="horizontal"?0:l;
    var b=m.createLinearGradient(0,0,j,h);
    var k=this.getColorStops();
    for(var e=0;e<k.length;e++){
        var g=k[e];
        var f=parseInt(g.position)/100;
        b.addColorStop(f,g.color)
        }
        m.fillStyle=b;
    m.fillRect(0,0,a,l);
    var d=c.toDataURL("image/png");
    return d
    },
onStopActivated:function(a){
    if(a=="color"){
        this.opacityStopsHandler.setActiveStopMakerElemAndUpdateDetailsPanel(null)
        }else{
        this.colorStopsHandler.setActiveStopMakerElemAndUpdateDetailsPanel(null)
        }
    },
onOrientationSelectorChange:function(b){
    var a=Event.element(b);
    this.outputOrientation=a.value;
    this.updateAllUI();
    ColorZilla.Persist.set("output-orientation",this.outputOrientation)
    },
onPreviewDimensionsChange:function(a){
    this.previewDimensionsWidth=Math.min(parseInt(this.previewDimensionWidthElem.value),350);
    this.previewDimensionsHeight=Math.min(parseInt(this.previewDimensionHeightElem.value),350);
    this.previewDimensionWidthElem.value=this.previewDimensionsWidth;
    this.previewDimensionHeightElem.value=this.previewDimensionsHeight;
    this.updatePreviewElement();
    ColorZilla.Persist.set("preview-width",this.previewDimensionsWidth);
    ColorZilla.Persist.set("preview-height",this.previewDimensionsHeight)
    },
onPreviewAsIECheckboxChange:function(b){
    var a=Event.element(b);
    this.previewAsIE=a.checked;
    this.updatePreviewElement()
    },
onColorFormatSelectorChange:function(b){
    var a=Event.element(b);
    this.cssColorFormat=a.value;
    this.cssNotesElem.hide();
    this.updateAllUI();
    ColorZilla.Persist.set("css-color-format",this.cssColorFormat)
    },
onIncludeCSSCommentsCheckboxChange:function(b){
    var a=Event.element(b);
    this.includeCSSComments=a.checked;
    this.updateAllUI();
    ColorZilla.Persist.set("include-css-comments",this.includeCSSComments?"true":"false")
    },
onImportFromCSSButtonClicked:function(a){
    this.importFromCSSTextElem.value="";
    this.toggleImportCSSPanel()
    },
onImportFromImageButtonClicked:function(a){
    this.importFromImageForm.reset();
    this.toggleImportImagePanel()
    },
onImportFromCSSPanelOkButtonClick:function(b){
    var a=this.importFromCSSTextElem.value;
    if(!a){
        this.showHideImportCSSPanel(false);
        return
    }
    if(!this.cssImporter){
        this.cssImporter=new Gradient.Importer()
        }
        var c=this.cssImporter.parseCSS(a);
    if(!c){
        alert("Couldn't parse gradient CSS.\nPlease check the format and try again.");
        return
    }
    this.setAllStops(c.stops,c.opacityStops);
    this.invalidateCurrentPreset();
    this.showHideImportCSSPanel(false)
    },
onImportFromImagePanelOkButtonClick:function(b){
    if(!this.importFromImageFileInputElem.value&&!this.importFromImageURLInputElem.value){
        alert("Please specify file to upload or URL");
        return
    }
    this.importFromImageForm.target="import-image-upload-target";
    this.importFromImageForm.submit();
    var a=this;
    window.importFromImageCallback=function(c){
        a.onImportFromImageCallback(c)
        }
    },
onImportFromImageCallback:function(a){
    if(!a){
        alert("There was an error importing the gradient.\nPlease verify that you provided a valid gradient image and try again.");
        return
    }else{
        var b=a.evalJSON(true);
        if(!b){
            alert("There was an error in the gradient data.\nPlease verify that you provided a valid gradient image and try again.");
            return
        }
        this.setAllStops(b.stops,"opacityStops" in b?b.opacityStops:null);
        this.invalidateCurrentPreset();
        this.showHideImportImagePanel(false)
        }
    },
onImportFromCSSPanelCancelButtonClick:function(a){
    this.showHideImportCSSPanel(false)
    },
onImportFromImagePanelCancelButtonClick:function(a){
    this.showHideImportImagePanel(false)
    },
onSaveNewPresetButtonClick:function(a){
    this.saveNewPreset()
    },
};

Gradient.Adjustments=function(b){
    this.gradientEditor=b;
    this.gradientControl=this.gradientEditor.gradientControl;
    var h=this.gradientControl.select(".gradient-adjustments-panel")[0];
    this.adjustments=["hue","sat","light"];
    this.adjustmentSliderElems={};
    
    this.adjustmentEditBoxElems={};
    
    this.adjustmentRanges={
        hue:{
            min:-180,
            max:180
        },
        sat:{
            min:-100,
            max:100
        },
        light:{
            min:-100,
            max:100
        },
    };
    
    for(var c=0;c<this.adjustments.length;c++){
        var k=this.adjustments[c];
        var g=h.select("."+k+"-adjust-bar-container")[0];
        var f=g.select("."+k+"-adjust-bar")[0];
        var l=h.select("."+k+"-adjust-value")[0];
        var a=Gradient.Utils.blankURI;
        var d=new Refresh.Web.Slider(f,{
            xMinValue:1,
            xMaxValue:this.adjustmentRanges[k].max*2,
            yMinValue:1,
            yMaxValue:1,
            arrowImage:a
        },g);
        this.adjustmentSliderElems[k]=d;
        this.adjustmentEditBoxElems[k]=l;
        d.onValuesChanged=this.onSliderValueChanged.bind(this,d,k);
        l.observe("keyup",this.onAdjustValueEntryBoxKeyUp.bindAsEventListener(this,k));
        l.observe("keydown",this.onAdjustValueEntryBoxKeyDown.bindAsEventListener(this,k));
        l.observe("blur",this.onAdjustValueEntryBoxBlur.bindAsEventListener(this,k))
        }
        this.adjustHueSaturationPanel=h.select(".adjust-hue-saturation-panel")[0];
    this.adjustHueSaturationPanelOkButton=this.adjustHueSaturationPanel.select("button.ok")[0];
    this.adjustHueSaturationPanelOkButton.observe("click",this.onAdjustHueSaturationPanelOkButtonClick.bind(this));
    this.adjustHueSaturationPanelCancelButton=this.adjustHueSaturationPanel.select("button.cancel")[0];
    this.adjustHueSaturationPanelCancelButton.observe("click",this.onAdjustHueSaturationPanelCancelButtonClick.bind(this));
    var e=h.select("button.adjust-reverse")[0];
    e.observe("click",this.onReverseGradientButtonClick.bind(this));
    var j=h.select("button.adjust-hue-sat")[0];
    j.observe("click",this.onAdjustHueSaturationButtonClick.bind(this));
    this.resetAllAdjustments()
    };
    
Gradient.Adjustments.prototype={
    resetSpecificAdjustment:function(a){
        this.adjustmentEditBoxElems[a].value=0;
        this.adjustmentSliderElems[a].xValue=this.adjustmentRanges[a].max;
        this.adjustmentSliderElems[a].setArrowPositionFromValues()
        },
    resetAllAdjustments:function(b){
        if(!this.adjustmentsMade&&(typeof b=="undefined")){
            return
        }
        this.adjustmentsMade=false;
        this.preAdjustmentStops=null;
        for(var a=0;a<this.adjustments.length;a++){
            this.resetSpecificAdjustment(this.adjustments[a])
            }
            this.currentAdjustments={
            hue:0,
            sat:0,
            light:0
        }
    },
startAdjusting:function(){
    if(this.adjustmentsMade){
        return
    }
    this.preAdjustmentStops=Gradient.Utils.deepClone(this.gradientEditor.getColorStops());
    this.adjustmentsMade=true;
    this.gradientEditor.invalidateCurrentPreset(true)
    },
setGradientAdjustment:function(b,a){
    this.startAdjusting();
    this.currentAdjustments[a]=b;
    this.adjustGradient()
    },
adjustGradient:function(){
    var h=Gradient.Utils.deepClone(this.preAdjustmentStops);
    var a=this.currentAdjustments.sat;
    var c=this.currentAdjustments.light;
    function f(k,i){
        if(i>0){
            k+=Math.floor((((255-k)*i)/100)+0.5)
            }else{
            if(i<0){
                k+=Math.floor(((k*i)/100)+0.5)
                }
            }
        if(k<0){
        k=0
        }
        if(k>255){
        k=255
        }
        return k
    }
    for(var b=0;b<h.length;b++){
    var e=h[b];
    var d=Gradient.Utils.hexaToRGB(e.color);
    var j=Gradient.Utils.rgbToHSL(d.red,d.green,d.blue);
    j.hue+=this.currentAdjustments.hue;
    j.hue=(((j.hue%360)+360)%360);
    j.sat=f(j.sat,a);
    j.light=f(j.light,c);
    var d=Gradient.Utils.hslToRGB(j.hue,j.sat,j.light);
    var g=Gradient.Utils.rgbToHexa(d.red,d.green,d.blue);
    e.color=g
    }
    this.gradientEditor.setColorStops(h)
    },
revertGradientToPreAdjustmentState:function(){
    if(!this.adjustmentsMade){
        return
    }
    this.gradientEditor.setColorStops(this.preAdjustmentStops)
    },
revertStops:function(c){
    var d=[];
    for(var b=c.length-1;b>=0;b--){
        var a=c[b];
        var e=100-parseInt(a.position);
        e+="%";
        a.position=e;
        d.push(a)
        }
        return d
    },
onAdjustHueSaturationButtonClick:function(a){
    if(Element.visible(this.adjustHueSaturationPanel)){
        return
    }
    Element.show(this.adjustHueSaturationPanel);
    this.resetAllAdjustments(true)
    },
onAdjustHueSaturationPanelOkButtonClick:function(a){
    this.resetAllAdjustments();
    Element.hide(this.adjustHueSaturationPanel)
    },
onAdjustHueSaturationPanelCancelButtonClick:function(a){
    if(this.adjustmentsMade){
        this.revertGradientToPreAdjustmentState()
        }
        this.onAdjustHueSaturationPanelOkButtonClick(a)
    },
onReverseGradientButtonClick:function(d){
    var b=Gradient.Utils.deepClone(this.gradientEditor.getColorStops());
    var e=this.revertStops(b);
    var a=Gradient.Utils.deepClone(this.gradientEditor.getOpacityStops());
    var c=this.revertStops(a);
    this.gradientEditor.setAllStops(e,c);
    this.gradientEditor.invalidateCurrentPreset()
    },
onSliderValueChanged:function(c,b){
    var e=c.xValue;
    var d=e-this.adjustmentRanges[b].max;
    var a=(d>0)?"+"+d:d;
    this.adjustmentEditBoxElems[b].value=a;
    this.setGradientAdjustment(d,b)
    },
onAdjustValueEntryBoxKeyUp:function(c,a){
    var b=Event.element(c);
    this.handleAdjustmentEntryBoxKeyEvent(b,a)
    },
onAdjustValueEntryBoxKeyDown:function(d,a){
    var b=Event.element(d);
    var f=parseInt(b.value);
    if(isNaN(f)){
        return
    }
    var e=38;
    var c=40;
    var g=d.keyCode;
    if(g==e){
        f++
    }
    if(g==c){
        f--
    }
    b.value=f;
    this.handleAdjustmentEntryBoxKeyEvent(b,a)
    },
onAdjustValueEntryBoxBlur:function(c,a){
    var b=Event.element(c);
    var d=b.value;
    if(isNaN(d)){
        b.value=0
        }
        this.handleAdjustmentEntryBoxKeyEvent(b,a)
    },
handleAdjustmentEntryBoxKeyEvent:function(d,b){
    var e=parseInt(d.value);
    if(isNaN(e)){
        return
    }
    var c=this.adjustmentRanges[b].min;
    var a=this.adjustmentRanges[b].max;
    if(e<c){
        e=c
        }
        if(e>a){
        e=a
        }
        this.setGradientAdjustment(e,b);
    this.adjustmentSliderElems[b].xValue=e+a;
    this.adjustmentSliderElems[b].setArrowPositionFromValues();
    if(e>0){
        e="+"+e
        }
        d.value=e
    },
};

Gradient.Utils={
    blankURI:"data:image/gif,GIF89a%01%00%01%00%80%00%00%00%00%00%00%00%00!%F9%04%01%00%00%00%00%2C%00%00%00%00%01%00%01%00%00%02%02D%01%00%3B",
    decimalToHexa:function(b){
        b=1*b;
        var a=b.toString(16);
        if(a.length<2){
            a="0"+a
            }
            return a
        },
    intToPercent:function(a){
        return Math.floor(((a*100)/255)+0.5)
        },
    hexaToRGB:function(b){
        var d=b.substr(1,2);
        var c=b.substr(3,2);
        var a=b.substr(5,2);
        d=parseInt(d,16);
        c=parseInt(c,16);
        a=parseInt(a,16);
        return{
            red:d,
            green:c,
            blue:a
        }
    },
rgbToHexa:function(e,d,a){
    var c=Gradient.Utils.decimalToHexa(e)+Gradient.Utils.decimalToHexa(d)+Gradient.Utils.decimalToHexa(a);
    c="#"+c;
    return c
    },
rbgToRGBCSS:function(a){
    var b=a.red+","+a.green+","+a.blue;
    return"rgb("+b+")"
    },
rbgAndAlphaToRGBACSS:function(a,c){
    var b=a.red+","+a.green+","+a.blue+","+c;
    return"rgba("+b+")"
    },
rgbToHSLCSS:function(c,e){
    var b=Gradient.Utils.rgbToHSL(c.red,c.green,c.blue);
    var d=b.hue+","+Gradient.Utils.intToPercent(b.sat)+"%,"+Gradient.Utils.intToPercent(b.light)+"%";
    var a=(typeof e!="undefined");
    if(a){
        d+=","+e
        }
        return"hsl"+(a?"a":"")+"("+d+")"
    },
rgbToHSL:function(a,f,i){
    a/=255;
    f/=255;
    i/=255;
    var j=Math.max(a,f,i);
    var d=Math.min(a,f,i);
    var c=(j+d)/2;
    var e,m;
    if(j==d){
        e=m=0
        }else{
        var k=j-d;
        m=k/((c>0.5)?(2-j-d):(j+d));
        switch(j){
            case a:
                e=(f-i)/k+(f<i?6:0);
                break;
            case f:
                e=(i-a)/k+2;
                break;
            case i:
                e=(a-f)/k+4;
                break
                }
                e/=6
        }
        e=Math.round(e*360);
    m=Math.round(m*255);
    c=Math.round(c*255);
    return{
        hue:e,
        sat:m,
        light:c
    }
},
hslToRGB:function(d,m,c){
    d/=360;
    m/=255;
    c/=255;
    var j=(c<=0.5)?c*(m+1):(c+m)-(c*m);
    var k=c*2-j;
    function i(g,b,l){
        if(l<0){
            l++
        }
        if(l>1){
            l--
        }
        if(l*6<1){
            return g+(b-g)*l*6
            }
            if(l*2<1){
            return b
            }
            if(l*3<2){
            return g+(b-g)*(2/3-l)*6
            }
            return g
        }
        var a=i(k,j,d+1/3);
    var e=i(k,j,d);
    var f=i(k,j,d-1/3);
    a=Math.round(a*255);
    e=Math.round(e*255);
    f=Math.round(f*255);
    return{
        red:a,
        green:e,
        blue:f
    }
},
rgbToHSV:function(i,h,c){
    var e,d,j;
    var a,f;
    a=Math.max(i,h,c);
    f=a-Math.min(i,h,c);
    d=(a==0)?0:(255*f/a);
    if(d==0){
        e=0
        }else{
        if(i==a){
            e=60*(h-c)/f
            }else{
            if(h==a){
                e=120+60*(c-i)/f
                }else{
                if(c==a){
                    e=240+60*(i-h)/f
                    }
                }
        }
}
if(e<0){
    e+=360
    }
    e=Math.round((e*255)/360);
d=Math.round(d);
j=a;
return{
    hue:e,
    sat:d,
    val:j
}
},
hsvToRGB:function(l,h,e){
    var a,k,n;
    var j,m,d,c,o;
    if(h==0){
        a=k=n=e
        }else{
        l=((l*359)/(255*60));
        h/=255;
        e/=255;
        j=Math.floor(l);
        m=l-j;
        d=e*(1-h);
        c=e*(1-(h*m));
        o=e*(1-h*(1-m));
        switch(j){
            case 0:
                a=e;
                k=o;
                n=d;
                break;
            case 1:
                a=c;
                k=e;
                n=d;
                break;
            case 2:
                a=d;
                k=e;
                n=o;
                break;
            case 3:
                a=d;
                k=c;
                n=e;
                break;
            case 4:
                a=o;
                k=d;
                n=e;
                break;
            default:
                a=e;
                k=d;
                n=c
                }
                a=Math.round(a*255);
        k=Math.round(k*255);
        n=Math.round(n*255)
        }
        return{
        red:a,
        green:k,
        blue:n
    }
},
deepClone:function(a){
    return Object.toJSON(a).evalJSON(true)
    },
selectTextInNode:function(c){
    if(("getSelection" in window)&&("createRange" in document)){
        var b=window.getSelection();
        var a=document.createRange();
        a.selectNodeContents(c);
        b.removeAllRanges();
        b.addRange(a)
        }else{
        if(("selection" in document)&&("createTextRange" in document.body)){
            document.selection.empty();
            var a=document.body.createTextRange();
            a.moveToElementText(el);
            a.select()
            }
        }
},
};

Gradient.UIUtils={
    showHideLinkTrigger:function(c,a){
        var d=Event.element(c);
        var b=$$(a);
        if(b.length==0){
            return false
            }
            b[0].toggle();
        d.parentNode.toggleClassName("showing");
        return false
        }
    };

Gradient.Importer=function(){
    this.testElem=document.createElement("div");
    this.testElem.style.display="none";
    document.documentElement.appendChild(this.testElem);
    this.roundAlpha=true
    };
    
Gradient.Importer.prototype={
    setRoundAlpha:function(a){
        this.roundAlpha=a
        },
    trim:function(a){
        return a.replace(/^\s+/,"").replace(/\s+$/,"")
        },
    cssSplit:function(g,e){
        var d=[];
        var a="";
        var f=0;
        for(var b=0;b<g.length;b++){
            var c=g.charAt(b);
            if(c=="("){
                f++
            }
            if(c==")"){
                f--
            }
            if((c==e)&&(f==0)){
                d.push(a);
                a=""
                }else{
                a+=c
                }
            }
        if(a){
        d.push(a)
        }
        return d
    },
isColor:function(b){
    if(!b){
        return false
        }
        var a=this.testElem;
    a.style.color="inherit";
    a.style.color=b;
    return a.style.color!="inherit"
    },
addPositionsToStopsIfNeeded:function(f){
    for(var b=0;b<f.length;b++){
        var a=f[b];
        if(a.position===null){
            if(b==0){
                a.position="0%"
                }else{
                if(b==(f.length-1)){
                    a.position="100%"
                    }else{
                    var e=f[b-1].position;
                    var g=f[b+1].position;
                    var h;
                    if(e&&g){
                        h=Math.round((parseInt(e)+parseInt(g))/2)
                        }else{
                        var c=f.length-1;
                        var d=100/c;
                        h=Math.round(b*d)
                        }
                        a.position=h+"%"
                    }
                }
        }
    }
return f
},
parseRGBCSSColor:function(i){
    if(!i){
        return null
        }
        var c=i.replace(/rgba?/,"");
    c=c.replace(/[() ]/g,"");
    var j=c.split(",");
    if(j.length<3){
        return null
        }
        var d=(j.length==4)?j[3]:1;
    if(this.roundAlpha){
        d*=100;
        d=Math.round(d);
        d/=100
        }
        d=d*1;
    var h=j[0];
    var f=j[1];
    var a=j[2];
    var e=Gradient.Utils.decimalToHexa(h)+Gradient.Utils.decimalToHexa(f)+Gradient.Utils.decimalToHexa(a);
    e="#"+e;
    return{
        value:e,
        opacity:d
    }
},
parseHSLCSSColor:function(j){
    if(!j){
        return null
        }
        var c=j.replace(/hsla?/,"");
    c=c.replace(/[() ]/g,"");
    var d=c.split(",");
    if(d.length<3){
        return null
        }
        var f=(d.length==4)?d[3]:1;
    if(this.roundAlpha){
        f*=100;
        f=Math.round(f);
        f/=100
        }
        f=f*1;
    var e=d[0];
    var i=parseInt(d[1])*255/100;
    var b=parseInt(d[2])*255/100;
    var g=Gradient.Utils.hslToRGB(e,i,b);
    var a=Gradient.Utils.decimalToHexa(g.red)+Gradient.Utils.decimalToHexa(g.green)+Gradient.Utils.decimalToHexa(g.blue);
    a="#"+a;
    return{
        value:a,
        opacity:f
    }
},
resolveColor:function(c){
    if(!this.isColor(c)){
        return null
        }
        var d=this.testElem;
    d.style.color="inherit";
    d.style.color=c;
    var b=document.defaultView.getComputedStyle(d,null);
    var a=b.color;
    var e=null;
    if(a=="transparent"){
        if(c.match(/rgba/)){
            e=this.parseRGBCSSColor(c)
            }else{
            if(c.match(/hsla/)){
                e=this.parseHSLCSSColor(c)
                }
            }
    }else{
    e=this.parseRGBCSSColor(a)
    }
    return e
},
parseStopCSSMozilla:function(d){
    d=this.trim(d);
    var a=null;
    var b=d;
    var e=d.split(" ");
    if(e.length>1){
        var c=e[e.length-1];
        if(c.match(/^ *[0-9]+% *$|/)){
            a=this.trim(c);
            b=this.trim(e.slice(0,-1).join(" "))
            }
        }
    b=this.resolveColor(b);
if(!b){
    b={
        color:null,
        opacity:null
    }
}
return{
    color:b.value,
    opacity:b.opacity,
    position:a
}
},
parseCSSMozilla:function(d){
    var f=this.cssSplit(d,",");
    if(f.length<2){
        return null
        }
        var e=this.trim(f[0]);
    var b=this.parseStopCSSMozilla(e);
    if(!this.isColor(b.color)){
        f=f.slice(1)
        }else{
        e=null
        }
        var c=[];
    for(var a=0;a<f.length;a++){
        var b=this.parseStopCSSMozilla(f[a]);
        if(!b){
            return null
            }
            c.push(b)
        }
        this.addPositionsToStopsIfNeeded(c);
    return{
        stops:c,
        firstItem:e
    }
},
parseStopCSSWebkit:function(d){
    d=d.replace(/ /g,"");
    d=d.replace(/from\(/,"color-stop(0.0,");
    d=d.replace(/to\(/,"color-stop(1.0,");
    var b=d.match(/color-stop\((.+)\)/);
    if(!b){
        return null
        }
        var e=b[1];
    var f=this.cssSplit(e,",");
    if(f.length<2){
        return null
        }
        var a=f[0];
    if(a.indexOf("%")==-1){
        a=Math.round(a*100);
        a=a+"%"
        }
        var c=f[1];
    c=this.resolveColor(c);
    if(!c){
        c={
            color:null,
            opacity:null
        }
    }
    return{
    color:c.value,
    opacity:c.opacity,
    position:a
}
},
parseCSSWebkit:function(f){
    var g=this.cssSplit(f,",");
    if(g.length<4){
        return null
        }
        var e=this.trim(g[0]);
    var c=this.trim(g[1]);
    g=g.slice(2);
    var d=[];
    for(var b=0;b<g.length;b++){
        var a=this.parseStopCSSWebkit(g[b]);
        if(!a){
            return null
            }
            d.push(a)
        }
        return{
        stops:d,
        startPoint:e,
        endPoint:c
    }
},
parseCSSIE:function(g){
    var f=null;
    var b=null;
    var d=g.split(",");
    for(var e=0;e<d.length;e++){
        var a=d[e];
        if(result=a.match(/startColorstr *= *'?([^']*)'?/i)){
            f=result[1].toLowerCase()
            }else{
            if(result=a.match(/endColorstr *= *'?([^']*)'?/i)){
                b=result[1].toLowerCase()
                }
            }
    }
    if(!f||!b){
    return null
    }
    var j=1;
var c=1;
if(f.length==9){
    j=f.substr(1,2);
    j=Math.round((parseInt(j,16)/255)*100)/100;
    f="#"+f.substr(3)
    }
    if(b.length==9){
    c=b.substr(1,2);
    c=Math.round((parseInt(c,16)/255)*100)/100;
    b="#"+b.substr(3)
    }
    var h=[{
    color:f,
    opacity:j,
    position:"0%"
},{
    color:b,
    opacity:c,
    position:"100%"
},];
return{
    stops:h
}
},
parseCSS:function(a){
    var b=null;
    if(result=a.match(/linear-gradient *\((.+)\)/)){
        b=this.parseCSSMozilla(result[1])
        }else{
        if(result=a.match(/-webkit-gradient *\( *linear *, *(.+)\)/)){
            b=this.parseCSSWebkit(result[1])
            }else{
            if(result=a.match(/progid:DXImageTransform.Microsoft.gradient *\((.+)\)/)){
                b=this.parseCSSIE(result[1])
                }
            }
    }
if(b&&Gradient.StopUtils.gradientHasOpacity(b)){
    b=Gradient.StopUtils.splitStopsIntoColorAndOpacity(b)
    }else{
    b=Gradient.StopUtils.extractColorOnlyStops(b);
    b.opacityStops=null
    }
    return b
},
};

Gradient.UserPresets={
    get:function(){
        var a=ColorZilla.LocalStorage.get("user-gradient-presets",null);
        if(!a){
            return[]
            }
            a=a.evalJSON(true);
        for(var b=0;b<a.length;b++){
            a[b].uniqueID=b
            }
            return a
        },
    persist:function(a){
        var b=a.toJSON();
        return ColorZilla.LocalStorage.set("user-gradient-presets",b)
        }
    };

Gradient.StopsHandler=function(c,e){
    this.gradientEditor=e.gradientEditor;
    this.gradientControl=e.gradientControl;
    this.gradientPanelElem=e.gradientPanelElem;
    this.gradientMarkersContainerElem=e.gradientMarkersContainerElem;
    this.gradientMarkerDeleterElem=e.gradientMarkerDeleterElem;
    this.stopDetailsPanel=e.stopDetailsPanel;
    this.onStopActivatedCallback=e.onStopActivatedCallback;
    this.type=c;
    this.stopDetailsColorPanel=null;
    this.opacityValueElem=null;
    if(this.type=="color"){
        this.stopDetailsColorPanel=this.gradientControl.select(".stop-details .color")[0];
        this.stopDetailsColorPanel.observe("click",this.onStopDetailsColorPanelClick.bind(this))
        }else{
        this.opacityValueElem=this.gradientControl.select(".stop-details .opacity-value")[0];
        this.opacityValueElem.observe("keyup",this.onOpacityDetailsEntryBoxKeyUp.bind(this));
        this.opacityValueElem.observe("keydown",this.onOpacityDetailsEntryBoxKeyDown.bind(this));
        this.opacityValueElem.observe("blur",this.onOpacityDetailsEntryBoxBlur.bind(this));
        this.opacityAdjustOpenButtonElem=this.gradientControl.select(".stop-details .opacity-adjust-open-button")[0];
        this.opacityAdjustOpenButtonElem.observe("click",this.onOpacityAdjustOpenButtonClick.bind(this))
        }
        this.stopDetailsPositionEntryBox=this.stopDetailsPanel.select(".position")[0];
    this.stopDetailsDeleteButton=this.stopDetailsPanel.select(".delete-button button")[0];
    this.setDisableStopDetailsPanel(true);
    this.onGradientControlMouseUpHandler=this.onGradientControlMouseUp.bind(this);
    this.onGradientControlMouseMoveHandler=this.onGradientControlMouseMove.bind(this);
    this.onStopMarkerDeleterMouseOverHandler=this.onStopMarkerDeleterMouseOver.bind(this);
    this.stopDetailsDeleteButton.observe("click",this.onStopDetailsDeleteButtonClick.bind(this));
    this.stopDetailsPositionEntryBox.observe("keyup",this.onStopDetailsPositionEntryBoxKeyUp.bind(this));
    this.stopDetailsPositionEntryBox.observe("keydown",this.onStopDetailsPositionEntryBoxKeyDown.bind(this));
    this.stopDetailsPositionEntryBox.observe("blur",this.onStopDetailsPositionEntryBoxBlur.bind(this));
    this.gradientMarkersContainerElem.observe("click",this.onGradientMarkersContainerClick.bind(this));
    this.activeStopMarkerElem=null;
    this.draggingStopMarkerElem=null;
    this.opacityStopAdjustContainerElem=null;
    if(this.type=="opacity"){
        this.defaultStops=[{
            opacity:1,
            position:"0%"
        },{
            opacity:1,
            position:"100%"
        },];
        this.stops=Gradient.Utils.deepClone(this.defaultStops);
        var d=Gradient.Utils.blankURI;
        this.opacityStopAdjustContainerElem=$$(".opacity-stop-adjust-container")[0];
        this.transparentScreen=$("transparent-screen");
        var a=this.opacityStopAdjustContainerElem.select(".opacity-slider-container")[0];
        var b=this.opacityStopAdjustContainerElem.select(".opacity-slider-bar")[0];
        this.opacityAdjustSlider=new Refresh.Web.Slider(b,{
            xMinValue:1,
            xMaxValue:100,
            yMinValue:1,
            yMaxValue:1,
            arrowImage:d
        },a);
        this.onDocumentClickToHideOpacityPanelHandler=this.onDocumentClickToHideOpacityPanel.bind(this);
        this.opacityAdjustSlider.onValuesChanged=this.onOpacityAdjustSliderValueChanged.bind(this)
        }
        this.lastUsedOpacity=1
    };
    
Gradient.StopsHandler.prototype={
    setStops:function(b,a){
        this.stops=b;
        this.setActiveStopMakerElemAndUpdateDetailsPanel(null);
        if((typeof a!="undefined")&&a){
            this.gradientEditor.updateAllUI()
            }
        },
getStops:function(){
    return this.stops
    },
getStopPositionFromMouseEvent:function(c){
    var b=Element.cumulativeOffset(this.gradientMarkersContainerElem)[0];
    var d=c-b;
    var a=Math.round((d*100)/this.gradientEditor.gradientPanelElemWidth);
    a=a+"%";
    return a
    },
updateStopMarkers:function(){
    var c=this.stops;
    for(var b=0;b<c.length;b++){
        var a=this.gradientMarkersContainerElem.select(".stop-marker-"+b);
        if(a.length==0){
            this.createStopMarker(b)
            }
            this.updateStopMarker(b,this.getStopValue(c[b]),c[b].position)
        }
        this.removeUnusedMarkers()
    },
updateStopMarker:function(e,c,a){
    a=parseInt(a);
    var b=this.findStopMarkerElemByIndex(e);
    var d=Math.round(((this.gradientEditor.gradientPanelElemWidth*a)/100)-5.5);
    b.style.left=d+"px";
    if(this.type=="color"){
        b.select(".color")[0].style.background=c;
        b.setAttribute("color",c)
        }else{
        b.select(".color")[0].style.background=this.opacityToStopColor(c);
        b.setAttribute("stop-opacity",c)
        }
        b.setAttribute("position",a);
    b.setAttribute("imarker",e)
    },
removeUnusedMarkers:function(){
    var a=this.gradientMarkersContainerElem.select(".stop-marker");
    for(var c=0;c<a.length;c++){
        var b=a[c];
        var d=b.getAttribute("imarker");
        if(d>=this.stops.length){
            b.parentNode.removeChild(b)
            }
        }
    },
opacityToStopColor:function(a){
    var b=255-Math.round(a*255);
    return Gradient.Utils.rgbToHexa(b,b,b)
    },
createStopMarker:function(c){
    var a=document.createElement("div");
    a.className="stop-marker stop-marker-"+c;
    var b=document.createElement("div");
    b.className="color";
    a.appendChild(b);
    this.gradientMarkersContainerElem.appendChild(a);
    Element.extend(a);
    a.observe("mousedown",this.onStopMarkerMouseDown.bind(this));
    a.observe("dblclick",this.onStopMarkerDoubleClick.bind(this));
    a.setAttribute("title",this.type=="color"?"Color stop":"Opacity stop")
    },
setActiveStopMakerElem:function(a){
    if(this.activeStopMarkerElem){
        this.activeStopMarkerElem.removeClassName("active")
        }
        this.activeStopMarkerElem=a;
    if(this.activeStopMarkerElem){
        this.activeStopMarkerElem.addClassName("active");
        if(this.type=="color"){
            this.gradientEditor.lastUsedColor=this.activeStopMarkerElem.getAttribute("color")
            }else{
            this.lastUsedOpacity=this.activeStopMarkerElem.getAttribute("stop-opacity")
            }
        }
},
setActiveStopMakerElemAndUpdateDetailsPanel:function(b){
    if(b&&this.onStopActivatedCallback){
        this.onStopActivatedCallback(this.type)
        }
        this.setActiveStopMakerElem(b);
    if(b){
        this.setDisableStopDetailsPanel(false);
        if(this.stopDetailsColorPanel){
            this.stopDetailsColorPanel.style.background=b.getAttribute("color");
            this.stopDetailsPositionEntryBox.focus()
            }else{
            if(this.opacityValueElem){
                var a=b.getAttribute("stop-opacity");
                this.opacityValueElem.value=Math.round(a*100);
                this.opacityValueElem.select();
                this.opacityValueElem.focus()
                }
            }
        this.stopDetailsPositionEntryBox.value=b.getAttribute("position");
    if(this.type=="color"){
        this.stopDetailsPositionEntryBox.select()
        }
    }else{
    this.setDisableStopDetailsPanel(true)
    }
},
getActiveStopMarkerElemIndex:function(){
    if(this.activeStopMarkerElem){
        return this.activeStopMarkerElem.getAttribute("imarker")
        }else{
        return null
        }
    },
getDraggingStopMarkerElemIndex:function(){
    if(this.draggingStopMarkerElem){
        return this.draggingStopMarkerElem.getAttribute("imarker")
        }else{
        return null
        }
    },
deleteStop:function(c){
    this.gradientEditor.invalidateCurrentPreset();
    var a=this.findStopMarkerElemByIndex(c);
    a.parentNode.removeChild(a);
    var d=[];
    for(var b=0;b<this.stops.length;b++){
        if(b!=c){
            d.push(this.stops[b])
            }
        }
    this.setStops(d,true);
this.setActiveStopMakerElemAndUpdateDetailsPanel(null)
},
sortStopsByPosition:function(){
    function a(e,c){
        var d=parseInt(e.position);
        var f=parseInt(c.position);
        return d-f
        }
        this.stops.sort(a)
    },
getStopValue:function(a){
    return(this.type=="color")?a.color:a.opacity
    },
findStopIndexByPositionAndValue:function(d,c){
    d=parseInt(d);
    for(var b=0;b<this.stops.length;b++){
        var a=this.getStopValue(this.stops[b]);
        if((parseInt(this.stops[b].position)==d)&&(a==c)){
            return b
            }
        }
    return null
},
findStopMarkerElemByIndex:function(a){
    return this.gradientMarkersContainerElem.select(".stop-marker-"+a)[0]
    },
changeActiveStopValue:function(a){
    var b=this.getActiveStopMarkerElemIndex();
    if(b===null){
        return
    }
    if(this.stopDetailsColorPanel){
        this.stopDetailsColorPanel.style.background=a
        }else{
        if(this.opacityValueElem){}
}
if(this.type=="color"){
    this.stops[b].color=a
    }else{
    this.stops[b].opacity=a
    }
    this.gradientEditor.updateAllUI()
},
updateStopPosition:function(b,a){
    this.stops[b].position=a;
    var c=this.getStopValue(this.stops[b]);
    this.sortStopsByPosition();
    this.gradientEditor.invalidateCurrentPreset();
    this.gradientEditor.updateAllUI();
    var e=this.findStopIndexByPositionAndValue(a,c);
    var d=this.findStopMarkerElemByIndex(e);
    this.setActiveStopMakerElem(d);
    if(this.draggingStopMarkerElem){
        this.draggingStopMarkerElem=d
        }
    },
setDisableStopDetailsPanel:function(a){
    if(a){
        this.stopDetailsPanel.addClassName("disabled");
        this.stopDetailsPositionEntryBox.value="";
        this.stopDetailsPositionEntryBox.setAttribute("disabled","true");
        this.stopDetailsDeleteButton.setAttribute("disabled","true");
        if(this.stopDetailsColorPanel){
            this.stopDetailsColorPanel.style.background="#efefef"
            }else{
            if(this.opacityValueElem){
                this.opacityValueElem.value="";
                this.opacityValueElem.setAttribute("disabled","true");
                this.opacityAdjustOpenButtonElem.addClassName("disabled")
                }
            }
    }else{
    this.stopDetailsPanel.removeClassName("disabled");
    this.stopDetailsPositionEntryBox.removeAttribute("disabled");
    if(this.stops.length>2){
        this.stopDetailsDeleteButton.removeAttribute("disabled")
        }else{
        this.stopDetailsDeleteButton.setAttribute("disabled","true")
        }
        if(this.opacityValueElem){
        this.opacityValueElem.removeAttribute("disabled");
        this.opacityAdjustOpenButtonElem.removeClassName("disabled")
        }
    }
},
showOpacityStopAdjustPanel:function(a,d,b){
    this.transparentScreen.show();
    var c=$$("body")[0].getHeight();
    this.transparentScreen.style.height=c+"px";
    this.opacityStopAdjustContainerElem.show();
    this.opacityStopAdjustContainerElem.style.left=a+"px";
    this.opacityStopAdjustContainerElem.style.top=d+"px";
    this.opacityAdjustSlider.xValue=Math.round(b*100);
    this.opacityAdjustSlider.setArrowPositionFromValues();
    document.observe("mousedown",this.onDocumentClickToHideOpacityPanelHandler)
    },
hideOpacityStopAdjustPanel:function(){
    this.transparentScreen.hide();
    this.opacityStopAdjustContainerElem.hide();
    document.stopObserving("mousedown",this.onDocumentClickToHideOpacityPanelHandler)
    },
opacityStopAdjustPanelIsVisible:function(){
    return this.opacityStopAdjustContainerElem&&this.opacityStopAdjustContainerElem.visible()
    },
registerDraggingEvents:function(){
    this.gradientControl.observe("mouseup",this.onGradientControlMouseUpHandler);
    this.gradientControl.observe("mousemove",this.onGradientControlMouseMoveHandler);
    this.gradientMarkerDeleterElem.observe("mouseover",this.onStopMarkerDeleterMouseOverHandler);
    this.gradientPanelElem.observe("mouseover",this.onStopMarkerDeleterMouseOverHandler)
    },
unregisterDraggingEvents:function(){
    this.gradientControl.stopObserving("mouseup",this.onGradientControlMouseUpHandler);
    this.gradientControl.stopObserving("mousemove",this.onGradientControlMouseMoveHandler);
    this.gradientMarkerDeleterElem.stopObserving("mouseover",this.onStopMarkerDeleterMouseOverHandler);
    this.gradientPanelElem.stopObserving("mouseover",this.onStopMarkerDeleterMouseOverHandler)
    },
onStopMarkerMouseDown:function(b){
    Event.stop(b);
    var a=Event.element(b);
    if(!a.hasClassName("stop-marker")){
        a=a.up(".stop-marker")
        }
        this.setActiveStopMakerElemAndUpdateDetailsPanel(a);
    this.draggingStopMarkerElem=a;
    this.registerDraggingEvents()
    },
onGradientControlMouseUp:function(a){
    this.draggingStopMarkerElem=null;
    this.unregisterDraggingEvents();
    if(this.type=="color"){
        this.stopDetailsPositionEntryBox.select()
        }
    },
onGradientControlMouseMove:function(c){
    if(!this.draggingStopMarkerElem){
        return
    }
    Event.stop(c);
    var d=Event.pointerX(c);
    var b=this.getStopPositionFromMouseEvent(d);
    var a=parseInt(b);
    if((a<0)||(a>100)){
        return
    }
    var e=this.getDraggingStopMarkerElemIndex();
    this.updateStopPosition(e,b);
    this.stopDetailsPositionEntryBox.value=parseInt(b)
    },
onStopMarkerDeleterMouseOver:function(b){
    var a=Event.element(b);
    if(this.draggingStopMarkerElem){
        if(this.stops.length>2){
            var c=this.getDraggingStopMarkerElemIndex();
            this.deleteStop(c)
            }
            this.draggingStopMarkerElem=null;
        this.unregisterDraggingEvents()
        }
    },
onStopDetailsDeleteButtonClick:function(a){
    if(this.activeStopMarkerElem){
        if(this.stops.length>2){
            var b=this.getActiveStopMarkerElemIndex();
            this.deleteStop(b)
            }
            this.setActiveStopMakerElemAndUpdateDetailsPanel(null)
        }
    },
handleStopDetailsPositionEntryBoxKeyEvent:function(b){
    var c=parseInt(b.value);
    if(isNaN(c)){
        return
    }
    if(c<0){
        c=0
        }
        if(c>100){
        c=100
        }
        b.value=c;
    if(this.activeStopMarkerElem){
        var d=this.getActiveStopMarkerElemIndex();
        var a=c;
        this.updateStopPosition(d,a+"%")
        }
    },
onStopDetailsPositionEntryBoxKeyUp:function(b){
    var a=Event.element(b);
    this.handleStopDetailsPositionEntryBoxKeyEvent(a)
    },
onStopDetailsPositionEntryBoxKeyDown:function(c){
    var a=Event.element(c);
    var e=parseInt(a.value);
    if(isNaN(e)){
        return
    }
    var d=38;
    var b=40;
    var f=c.keyCode;
    if(f==d){
        e++
    }
    if(f==b){
        e--
    }
    a.value=e;
    this.handleStopDetailsPositionEntryBoxKeyEvent(a)
    },
onStopDetailsPositionEntryBoxBlur:function(b){
    var a=Event.element(b);
    var d=parseInt(a.value);
    if(isNaN(d)&&this.activeStopMarkerElem){
        var e=this.getActiveStopMarkerElemIndex();
        var c=this.stops[e].position;
        a.value=parseInt(c)
        }
    },
handleOpacityDetailsEntryBoxKeyEvent:function(a){
    var b=parseInt(a.value);
    if(isNaN(b)){
        return
    }
    if(b<0){
        b=0
        }
        if(b>100){
        b=100
        }
        a.value=b;
    if(this.activeStopMarkerElem){
        var c=b/100;
        this.changeActiveStopValue(c);
        this.lastUsedOpacity=c
        }
    },
onOpacityDetailsEntryBoxKeyUp:function(b){
    var a=Event.element(b);
    this.handleOpacityDetailsEntryBoxKeyEvent(a)
    },
onOpacityDetailsEntryBoxKeyDown:function(c){
    var a=Event.element(c);
    var a=Event.element(c);
    var e=parseInt(a.value);
    if(isNaN(e)){
        return
    }
    var d=38;
    var b=40;
    var f=c.keyCode;
    if(f==d){
        e++
    }
    if(f==b){
        e--
    }
    a.value=e;
    this.handleOpacityDetailsEntryBoxKeyEvent(a)
    },
onOpacityDetailsEntryBoxBlur:function(c){
    var b=Event.element(c);
    var d=parseInt(b.value);
    if(isNaN(d)&&this.activeStopMarkerElem){
        var e=this.getActiveStopMarkerElemIndex();
        var a=this.stops[e].opacity;
        b.value=Math.round(a*100)
        }
    },
onStopDetailsColorPanelClick:function(c){
    if(!this.activeStopMarkerElem){
        return
    }
    var a=Event.element(c);
    var d=Event.pointerX(c);
    var b=Event.pointerY(c);
    this.gradientEditor.openColorPicker(d,b)
    },
onStopMarkerDoubleClick:function(b){
    var a=Event.element(b);
    if(this.type=="color"){
        this.gradientEditor.openColorPicker()
        }else{
        var c=a.cumulativeOffset();
        this.showOpacityStopAdjustPanel(c[0]+6,c[1]-35,this.lastUsedOpacity)
        }
    },
onOpacityAdjustOpenButtonClick:function(b){
    if(!this.activeStopMarkerElem){
        return
    }
    var a=Event.element(b);
    var c=a.cumulativeOffset();
    this.showOpacityStopAdjustPanel(c[0]+10,c[1]-10,this.lastUsedOpacity)
    },
onDocumentClickToHideOpacityPanel:function(b){
    if(!this.opacityStopAdjustPanelIsVisible()){
        return
    }
    Event.stop(b);
    var a=Event.element(b);
    if(a.hasClassName("opacity-stop-adjust-container")||a.up(".opacity-stop-adjust-container")){
        return
    }
    this.hideOpacityStopAdjustPanel()
    },
onOpacityAdjustSliderValueChanged:function(){
    var a=this.opacityAdjustSlider.xValue;
    var b=a/100;
    if(this.activeStopMarkerElem){
        this.changeActiveStopValue(b);
        this.lastUsedOpacity=b;
        this.opacityValueElem.value=a
        }
    },
onGradientMarkersContainerClick:function(d){
    var c=Event.element(d);
    if(c!=this.gradientMarkersContainerElem){
        return
    }
    var f=Event.pointerX(d);
    var a=this.getStopPositionFromMouseEvent(f);
    var g;
    var b;
    if(this.type=="color"){
        g=this.gradientEditor.lastUsedColor;
        b={
            color:g,
            position:a
        }
    }else{
    g=this.lastUsedOpacity;
    b={
        opacity:g,
        position:a
    }
}
this.stops.push(b);
this.sortStopsByPosition();
this.gradientEditor.updateAllUI();
var h=this.findStopIndexByPositionAndValue(a,g);
var e=this.findStopMarkerElemByIndex(h);
this.setActiveStopMakerElemAndUpdateDetailsPanel(e)
},
};

Gradient.StopUtils={
    interpolateStopsProperty:function(n,m,r,b){
        var d=parseInt(n.position);
        var l=parseInt(m.position);
        var g=r;
        var i=l-d;
        var j=g-d;
        var f=j/i;
        var a=1-f;
        if(b=="color"){
            var p=Gradient.Utils.hexaToRGB(n.color);
            var c=Gradient.Utils.hexaToRGB(m.color);
            var e=Math.round(p.red*a+c.red*f);
            var h=Math.round(p.green*a+c.green*f);
            var k=Math.round(p.blue*a+c.blue*f);
            return{
                red:e,
                green:h,
                blue:k
            }
        }else{
        var q=n.opacity;
        var o=m.opacity;
        return Math.round((q*a+o*f)*100)/100
        }
    },
interpolateStopsColor:function(e,c,b,d){
    var a=Gradient.StopUtils.interpolateStopsProperty(e,c,b,"color");
    if((typeof d==="undefined")||(d=="hex")){
        return Gradient.Utils.rgbToHexa(a.red,a.green,a.blue)
        }
        return a
    },
interpolateStopsOpacity:function(c,b,a){
    return Gradient.StopUtils.interpolateStopsProperty(c,b,a,"opacity")
    },
getColorForOpacityOnlyStop:function(k,f,b,c){
    var e=k;
    var a=null;
    for(var d=e+1;d<f.length;d++){
        if("color" in b[f[d]]){
            a=b[f[d]];
            break
        }
    }
    var g=null;
for(var d=e-1;d>=0;d--){
    if("color" in b[f[d]]){
        g=b[f[d]];
        break
    }
}
if(!g){
    g=a
    }
    if(!a){
    a=g
    }
    var h=g.color;
if(g!=a){
    h=Gradient.StopUtils.interpolateStopsColor(g,a,parseInt(f[k]),c)
    }
    return h
},
getOpacityForColorOnlyStop:function(h,c,g){
    var e=h;
    var b=null;
    for(var d=e+1;d<c.length;d++){
        if("opacity" in g[c[d]]){
            b=g[c[d]];
            break
        }
    }
    var a=null;
for(var d=e-1;d>=0;d--){
    if("opacity" in g[c[d]]){
        a=g[c[d]];
        break
    }
}
if(!a){
    a=b
    }
    if(!b){
    b=a
    }
    var f=a.opacity;
if(a!=b){
    var f=Gradient.StopUtils.interpolateStopsOpacity(a,b,parseInt(c[h]))
    }
    return f
},
mergeStops:function(d,c){
    var k=Gradient.Utils.deepClone(d);
    var g=Gradient.Utils.deepClone(c);
    k=k.concat(g);
    function a(n,i){
        var m=parseInt(n.position);
        var o=parseInt(i.position);
        return m-o
        }
        k.sort(a);
    var f=[];
    var b={};
    
    for(var e=0;e<k.length;e++){
        var j=k[e];
        var h=j.position;
        if(!(h in b)){
            f.push(h);
            b[h]={
                position:h
            }
        }
        if("color" in j){
        b[h].color=j.color
        }
        if("opacity" in j){
        b[h].opacity=j.opacity
        }
    }
    var l=[];
for(var e=0;e<f.length;e++){
    var j=b[f[e]];
    if(!("color" in j)){
        j.color=Gradient.StopUtils.getColorForOpacityOnlyStop(e,f,b,"hex")
        }
        if(!("opacity" in j)){
        j.opacity=Gradient.StopUtils.getOpacityForColorOnlyStop(e,f,b)
        }
        l.push(j)
    }
    return l
},
extractStopByType:function(a,b){
    if(b=="color"){
        return{
            position:a.position,
            color:a.color
            }
        }else{
    if(b=="opacity"){
        return{
            position:a.position,
            opacity:a.opacity
            }
        }
}
return null
},
splitStopsIntoColorAndOpacity:function(k){
    var m=k.stops;
    if(m.length<2){
        return null
        }
        var a=[];
    var e=[];
    for(var c=1;c<m.length-1;c++){
        var j=m[c];
        var f=m[c-1];
        var l=m[c+1];
        var b=Gradient.Utils.hexaToRGB(j.color);
        var n=Gradient.StopUtils.interpolateStopsColor(f,l,parseInt(j.position),"rgb");
        var o=n.red;
        var d=n.green;
        var g=n.blue;
        var h=Gradient.StopUtils.interpolateStopsOpacity(f,l,parseInt(j.position));
        if((Math.abs(o-b.red)>1)||(Math.abs(d-b.green)>1)||(Math.abs(g-b.blue)>1)){
            a.push(Gradient.StopUtils.extractStopByType(j,"color"))
            }
            if(Math.abs(h-(Math.round(j.opacity*100)/100))>0.05){
            e.push(Gradient.StopUtils.extractStopByType(j,"opacity"))
            }
        }
    if(a.length==0){
    a=[Gradient.StopUtils.extractStopByType(m[0],"color"),Gradient.StopUtils.extractStopByType(m[m.length-1],"color")]
    }else{
    if(m[0].color!=a[0].color){
        a.unshift(Gradient.StopUtils.extractStopByType(m[0],"color"))
        }
        if(m[m.length-1].color!=a[a.length-1].color){
        a.push(Gradient.StopUtils.extractStopByType(m[m.length-1],"color"))
        }
    }
if(e.length==0){
    e=[Gradient.StopUtils.extractStopByType(m[0],"opacity"),Gradient.StopUtils.extractStopByType(m[m.length-1],"opacity")]
    }else{
    if(m[0].opacity!=e[0].opacity){
        e.unshift(Gradient.StopUtils.extractStopByType(m[0],"opacity"))
        }
        if(m[m.length-1].opacity!=e[e.length-1].opacity){
        e.push(Gradient.StopUtils.extractStopByType(m[m.length-1],"opacity"))
        }
    }
k.stops=Gradient.Utils.deepClone(a);
k.opacityStops=Gradient.Utils.deepClone(e);
return k
},
gradientHasOpacity:function(c){
    if(!c){
        return false
        }
        if(!c.stops){
        return false
        }
        for(var b=0;b<c.stops.length;b++){
        var a=c.stops[b];
        if(("opacity" in a)&&(a.opacity!=1)){
            return true
            }
        }
    return false
},
extractColorOnlyStops:function(b){
    if(!b){
        return
    }
    if(!b.stops){
        return
    }
    for(var a=0;a<b.stops.length;a++){
        b.stops[a]=Gradient.StopUtils.extractStopByType(b.stops[a],"color")
        }
        return b
    },
};/*
ColorPicker
Copyright (c) 2007 John Dyer (http://johndyer.name)
MIT style license
*/
if(!window.Refresh){
    Refresh={}
    }
    if(!Refresh.Web){
    Refresh.Web={}
    }
    Refresh.Web.Color=function(b){
    var a={
        r:0,
        g:0,
        b:0,
        h:0,
        s:0,
        v:0,
        hex:"",
        setRgb:function(e,d,c){
            this.r=e;
            this.g=d;
            this.b=c;
            var f=Refresh.Web.ColorMethods.rgbToHsv(this);
            this.h=f.h;
            this.s=f.s;
            this.v=f.v;
            this.hex=Refresh.Web.ColorMethods.rgbToHex(this)
            },
        setHsv:function(e,d,c){
            this.h=e;
            this.s=d;
            this.v=c;
            var f=Refresh.Web.ColorMethods.hsvToRgb(this);
            this.r=f.r;
            this.g=f.g;
            this.b=f.b;
            this.hex=Refresh.Web.ColorMethods.rgbToHex(f)
            },
        setHex:function(c){
            this.hex=c;
            var e=Refresh.Web.ColorMethods.hexToRgb(this.hex);
            this.r=e.r;
            this.g=e.g;
            this.b=e.b;
            var d=Refresh.Web.ColorMethods.rgbToHsv(e);
            this.h=d.h;
            this.s=d.s;
            this.v=d.v
            }
        };
    
if(b){
    if("hex" in b){
        a.setHex(b.hex)
        }else{
        if("r" in b){
            a.setRgb(b.r,b.g,b.b)
            }else{
            if("h" in b){
                a.setHsv(b.h,b.s,b.v)
                }
            }
    }
}
return a
};

Refresh.Web.ColorMethods={
    hexToRgb:function(e){
        e=this.validateHex(e);
        var d="00",c="00",a="00";
        if(e.length==6){
            d=e.substring(0,2);
            c=e.substring(2,4);
            a=e.substring(4,6)
            }else{
            if(e.length>4){
                d=e.substring(4,e.length);
                e=e.substring(0,4)
                }
                if(e.length>2){
                c=e.substring(2,e.length);
                e=e.substring(0,2)
                }
                if(e.length>0){
                a=e.substring(0,e.length)
                }
            }
        return{
        r:this.hexToInt(d),
        g:this.hexToInt(c),
        b:this.hexToInt(a)
        }
    },
validateHex:function(a){
    a=new String(a).toUpperCase();
    a=a.replace(/[^A-F0-9]/g,"0");
    if(a.length>6){
        a=a.substring(0,6)
        }
        return a
    },
webSafeDec:function(a){
    a=Math.round(a/51);
    a*=51;
    return a
    },
hexToWebSafe:function(e){
    var d,c,a;
    if(e.length==3){
        d=e.substring(0,1);
        c=e.substring(1,1);
        a=e.substring(2,1)
        }else{
        d=e.substring(0,2);
        c=e.substring(2,4);
        a=e.substring(4,6)
        }
        return intToHex(this.webSafeDec(this.hexToInt(d)))+this.intToHex(this.webSafeDec(this.hexToInt(c)))+this.intToHex(this.webSafeDec(this.hexToInt(a)))
    },
rgbToWebSafe:function(a){
    return{
        r:this.webSafeDec(a.r),
        g:this.webSafeDec(a.g),
        b:this.webSafeDec(a.b)
        }
    },
rgbToHex:function(a){
    return this.intToHex(a.r)+this.intToHex(a.g)+this.intToHex(a.b)
    },
intToHex:function(b){
    var a=(parseInt(b).toString(16));
    if(a.length==1){
        a=("0"+a)
        }
        return a.toUpperCase()
    },
hexToInt:function(a){
    return(parseInt(a,16))
    },
rgbToHsv:function(d){
    var h=d.r/255;
    var f=d.g/255;
    var c=d.b/255;
    hsv={
        h:0,
        s:0,
        v:0
    };
    
    var e=0;
    var a=0;
    if(h>=f&&h>=c){
        a=h;
        e=(f>c)?c:f
        }else{
        if(f>=c&&f>=h){
            a=f;
            e=(h>c)?c:h
            }else{
            a=c;
            e=(f>h)?h:f
            }
        }
    hsv.v=a;
hsv.s=(a)?((a-e)/a):0;
if(!hsv.s){
    hsv.h=0
    }else{
    delta=a-e;
    if(h==a){
        hsv.h=(f-c)/delta
        }else{
        if(f==a){
            hsv.h=2+(c-h)/delta
            }else{
            hsv.h=4+(h-f)/delta
            }
        }
    hsv.h=parseInt(hsv.h*60);
if(hsv.h<0){
    hsv.h+=360
    }
}
hsv.s=parseInt(hsv.s*100);
hsv.v=parseInt(hsv.v*100);
return hsv
},
hsvToRgb:function(e){
    rgb={
        r:0,
        g:0,
        b:0
    };
    
    var d=e.h;
    var l=e.s;
    var j=e.v;
    if(l==0){
        if(j==0){
            rgb.r=rgb.g=rgb.b=0
            }else{
            rgb.r=rgb.g=rgb.b=parseInt(j*255/100)
            }
        }else{
    if(d==360){
        d=0
        }
        d/=60;
    l=l/100;
    j=j/100;
    var c=parseInt(d);
    var g=d-c;
    var b=j*(1-l);
    var a=j*(1-(l*g));
    var k=j*(1-(l*(1-g)));
    switch(c){
        case 0:
            rgb.r=j;
            rgb.g=k;
            rgb.b=b;
            break;
        case 1:
            rgb.r=a;
            rgb.g=j;
            rgb.b=b;
            break;
        case 2:
            rgb.r=b;
            rgb.g=j;
            rgb.b=k;
            break;
        case 3:
            rgb.r=b;
            rgb.g=a;
            rgb.b=j;
            break;
        case 4:
            rgb.r=k;
            rgb.g=b;
            rgb.b=j;
            break;
        case 5:
            rgb.r=j;
            rgb.g=b;
            rgb.b=a;
            break
            }
            rgb.r=parseInt(rgb.r*255);
    rgb.g=parseInt(rgb.g*255);
    rgb.b=parseInt(rgb.b*255)
    }
    return rgb
},
normalizeHex:function(a){
    return this.rgbToHex(this.hexToRgb(a))
    }
};/*
ColorPicker
Copyright (c) 2007 John Dyer (http://johndyer.name)
MIT style license
*/
if(!window.Refresh){
    Refresh={}
    }
    if(!Refresh.Web){
    Refresh.Web={}
    }
    Refresh.Web.ColorValuePicker=Class.create();
Refresh.Web.ColorValuePicker.prototype={
    initialize:function(a){
        this.id=a;
        this.onValuesChanged=null;
        this._hueInput=$(this.id+"_Hue");
        this._valueInput=$(this.id+"_Brightness");
        this._saturationInput=$(this.id+"_Saturation");
        this._redInput=$(this.id+"_Red");
        this._greenInput=$(this.id+"_Green");
        this._blueInput=$(this.id+"_Blue");
        this._hexInput=$(this.id+"_Hex");
        this._event_onHsvKeyUp=this._onHsvKeyUp.bindAsEventListener(this);
        this._event_onHsvBlur=this._onHsvBlur.bindAsEventListener(this);
        this._event_onRgbKeyUp=this._onRgbKeyUp.bindAsEventListener(this);
        this._event_onRgbBlur=this._onRgbBlur.bindAsEventListener(this);
        this._event_onHexKeyUp=this._onHexKeyUp.bindAsEventListener(this);
        Event.observe(this._hueInput,"keyup",this._event_onHsvKeyUp);
        Event.observe(this._valueInput,"keyup",this._event_onHsvKeyUp);
        Event.observe(this._saturationInput,"keyup",this._event_onHsvKeyUp);
        Event.observe(this._hueInput,"blur",this._event_onHsvBlur);
        Event.observe(this._valueInput,"blur",this._event_onHsvBlur);
        Event.observe(this._saturationInput,"blur",this._event_onHsvBlur);
        Event.observe(this._redInput,"keyup",this._event_onRgbKeyUp);
        Event.observe(this._greenInput,"keyup",this._event_onRgbKeyUp);
        Event.observe(this._blueInput,"keyup",this._event_onRgbKeyUp);
        Event.observe(this._redInput,"blur",this._event_onRgbBlur);
        Event.observe(this._greenInput,"blur",this._event_onRgbBlur);
        Event.observe(this._blueInput,"blur",this._event_onRgbBlur);
        Event.observe(this._hexInput,"keyup",this._event_onHexKeyUp);
        this.color=new Refresh.Web.Color();
        if(this._hexInput.value!=""){
            this.color.setHex(this._hexInput.value)
            }
            this._hexInput.value=this.color.hex;
        this._redInput.value=this.color.r;
        this._greenInput.value=this.color.g;
        this._blueInput.value=this.color.b;
        this._hueInput.value=this.color.h;
        this._saturationInput.value=this.color.s;
        this._valueInput.value=this.color.v
        },
    _onHsvKeyUp:function(a){
        if(a.target.value==""){
            return
        }
        this.validateHsv(a);
        this.setValuesFromHsv();
        if(this.onValuesChanged){
            this.onValuesChanged(this)
            }
        },
_onRgbKeyUp:function(a){
    if(a.target.value==""){
        return
    }
    this.validateRgb(a);
    this.setValuesFromRgb();
    if(this.onValuesChanged){
        this.onValuesChanged(this)
        }
    },
_onHexKeyUp:function(a){
    if(a.target.value==""){
        return
    }
    this.validateHex(a);
    this.setValuesFromHex();
    if(this.onValuesChanged){
        this.onValuesChanged(this)
        }
    },
_onHsvBlur:function(a){
    if(a.target.value==""){
        this.setValuesFromRgb()
        }
    },
_onRgbBlur:function(a){
    if(a.target.value==""){
        this.setValuesFromHsv()
        }
    },
HexBlur:function(a){
    if(a.target.value==""){
        this.setValuesFromHsv()
        }
    },
validateRgb:function(a){
    if(!this._keyNeedsValidation(a)){
        return a
        }
        this._redInput.value=this._setValueInRange(this._redInput.value,0,255);
    this._greenInput.value=this._setValueInRange(this._greenInput.value,0,255);
    this._blueInput.value=this._setValueInRange(this._blueInput.value,0,255)
    },
validateHsv:function(a){
    if(!this._keyNeedsValidation(a)){
        return a
        }
        this._hueInput.value=this._setValueInRange(this._hueInput.value,0,359);
    this._saturationInput.value=this._setValueInRange(this._saturationInput.value,0,100);
    this._valueInput.value=this._setValueInRange(this._valueInput.value,0,100)
    },
validateHex:function(b){
    if(!this._keyNeedsValidation(b)){
        return b
        }
        var a=new String(this._hexInput.value).toUpperCase();
    a=a.replace(/[^A-F0-9]/g,"0");
    if(a.length>6){
        a=a.substring(0,6)
        }
        this._hexInput.value=a
    },
_keyNeedsValidation:function(a){
    if(a.keyCode==9||a.keyCode==16||a.keyCode==38||a.keyCode==29||a.keyCode==40||a.keyCode==37||(a.ctrlKey&&(a.keyCode=="c".charCodeAt()||a.keyCode=="v".charCodeAt()))){
        return false
        }
        return true
    },
_setValueInRange:function(c,b,a){
    if(c==""||isNaN(c)){
        return b
        }
        c=parseInt(c);
    if(c>a){
        return a
        }
        if(c<b){
        return b
        }
        return c
    },
setValuesFromRgb:function(){
    this.color.setRgb(this._redInput.value,this._greenInput.value,this._blueInput.value);
    this._hexInput.value=this.color.hex;
    this._hueInput.value=this.color.h;
    this._saturationInput.value=this.color.s;
    this._valueInput.value=this.color.v
    },
setValuesFromHsv:function(){
    this.color.setHsv(this._hueInput.value,this._saturationInput.value,this._valueInput.value);
    this._hexInput.value=this.color.hex;
    this._redInput.value=this.color.r;
    this._greenInput.value=this.color.g;
    this._blueInput.value=this.color.b
    },
setValuesFromHex:function(){
    this.color.setHex(this._hexInput.value);
    this._redInput.value=this.color.r;
    this._greenInput.value=this.color.g;
    this._blueInput.value=this.color.b;
    this._hueInput.value=this.color.h;
    this._saturationInput.value=this.color.s;
    this._valueInput.value=this.color.v
    }
};/*
ColorPicker
Copyright (c) 2007 John Dyer (http://johndyer.name)
MIT style license
*/
if(!window.Refresh){
    Refresh={}
    }
    if(!Refresh.Web){
    Refresh.Web={}
    }
    Refresh.Web.SlidersList=[];
Refresh.Web.DefaultSliderSettings={
    xMinValue:0,
    xMaxValue:100,
    yMinValue:0,
    yMaxValue:100,
    arrowImage:"images/rangearrows.gif"
};

Refresh.Web.Slider=Class.create();
Refresh.Web.Slider.prototype={
    _container:null,
    _bar:null,
    _arrow:null,
    initialize:function(d,b,a){
        this.id=d;
        this.settings=Object.extend(Object.extend({},Refresh.Web.DefaultSliderSettings),b||{});
        this.xValue=0;
        this.yValue=0;
        this._bar=$(this.id);
        this._arrow=document.createElement("img");
        this._arrow.border=0;
        this._arrow.src=this.settings.arrowImage;
        this._arrow.margin=0;
        this._arrow.padding=0;
        this._arrow.style.position="absolute";
        this._arrow.style.zIndex="5";
        this._arrow.style.top="0px";
        this._arrow.style.left="0px";
        if(a){
            a.appendChild(this._arrow);
            this._container=a
            }else{
            document.body.appendChild(this._arrow)
            }
            var c=this;
        this.setPositioningVariables();
        this._event_docMouseMove=this._docMouseMove.bindAsEventListener(this);
        this._event_docMouseUp=this._docMouseUp.bindAsEventListener(this);
        this._event_docMouseOut=this._docMouseOut.bindAsEventListener(this);
        Event.observe(this._bar,"mousedown",this._bar_mouseDown.bindAsEventListener(this));
        Event.observe(this._arrow,"mousedown",this._arrow_mouseDown.bindAsEventListener(this));
        this.setArrowPositionFromValues();
        if(this.onValuesChanged){
            this.onValuesChanged(this)
            }
            Refresh.Web.SlidersList.push(this)
        },
    setPositioningVariables:function(){
        this._barWidth=this._bar.getWidth();
        this._barHeight=this._bar.getHeight();
        var a=this._bar.cumulativeOffset();
        this._barTop=a.top;
        this._barLeft=a.left;
        this._barBottom=this._barTop+this._barHeight;
        this._barRight=this._barLeft+this._barWidth;
        this._arrow=$(this._arrow);
        this._arrowWidth=this._arrow.getWidth();
        this._arrowHeight=this._arrow.getHeight();
        this.MinX=this._barLeft;
        this.MinY=this._barTop;
        this.MaxX=this._barRight;
        this.MinY=this._barBottom
        },
    setArrowPositionFromValues:function(g){
        this.setPositioningVariables();
        var b=0;
        var a=0;
        if(this.settings.xMinValue!=this.settings.xMaxValue){
            if(this.xValue==this.settings.xMinValue){
                b=0
                }else{
                if(this.xValue==this.settings.xMaxValue){
                    b=this._barWidth-1
                    }else{
                    var h=this.settings.xMaxValue;
                    if(this.settings.xMinValue<1){
                        h=h+Math.abs(this.settings.xMinValue)+1
                        }
                        var d=this.xValue;
                    if(this.xValue<1){
                        d=d+1
                        }
                        b=d/h*this._barWidth;
                    if(parseInt(b)==(h-1)){
                        b=h
                        }else{
                        b=parseInt(b)
                        }
                        if(this.settings.xMinValue<1){
                        b=b-Math.abs(this.settings.xMinValue)-1
                        }
                    }
            }
    }
if(this.settings.yMinValue!=this.settings.yMaxValue){
    if(this.yValue==this.settings.yMinValue){
        a=0
        }else{
        if(this.yValue==this.settings.yMaxValue){
            a=this._barHeight-1
            }else{
            var f=this.settings.yMaxValue;
            if(this.settings.yMinValue<1){
                f=f+Math.abs(this.settings.yMinValue)+1
                }
                var c=this.yValue;
            if(this.yValue<1){
                c=c+1
                }
                var a=c/f*this._barHeight;
            if(parseInt(a)==(f-1)){
                a=f
                }else{
                a=parseInt(a)
                }
                if(this.settings.yMinValue<1){
                a=a-Math.abs(this.settings.yMinValue)-1
                }
            }
    }
}
this._setArrowPosition(b,a)
},
_setArrowPosition:function(a,d){
    if(a<0){
        a=0
        }
        if(a>this._barWidth){
        a=this._barWidth
        }
        if(d<0){
        d=0
        }
        if(d>this._barHeight){
        d=this._barHeight
        }
        if(!this._container){
        var c=this._barLeft+a;
        var b=this._barTop+d
        }else{
        var c=a;
        var b=d
        }
        if(this._arrowWidth>this._barWidth){
        c=c-(this._arrowWidth/2-this._barWidth/2)
        }else{
        c=c-parseInt(this._arrowWidth/2)
        }
        if(this._arrowHeight>this._barHeight){
        b=b-(this._arrowHeight/2-this._barHeight/2)
        }else{
        b=b-parseInt(this._arrowHeight/2)
        }
        this._arrow.style.left=c+"px";
    this._arrow.style.top=b+"px"
    },
_bar_mouseDown:function(a){
    this._mouseDown(a)
    },
_arrow_mouseDown:function(a){
    this._mouseDown(a)
    },
_mouseDown:function(a){
    Refresh.Web.ActiveSlider=this;
    this.setValuesFromMousePosition(a);
    Event.observe(document,"mousemove",this._event_docMouseMove);
    Event.observe(document,"mouseup",this._event_docMouseUp);
    Event.observe(document,"mouseout",this._event_docMouseOut);
    Event.stop(a)
    },
_docMouseOut:function(a){
    if(a.target.tagName=="HTML"){
        this._docMouseUp(a)
        }
    },
_docMouseMove:function(a){
    this.setValuesFromMousePosition(a);
    Event.stop(a)
    },
_docMouseUp:function(a){
    Event.stopObserving(document,"mouseup",this._event_docMouseUp);
    Event.stopObserving(document,"mousemove",this._event_docMouseMove);
    Event.stopObserving(document,"mouseout",this._event_docMouseOut);
    Event.stop(a)
    },
setValuesFromMousePosition:function(g){
    this.setPositioningVariables();
    var a=Event.pointer(g);
    var d=0;
    var b=0;
    if(a.x<this._barLeft){
        d=0
        }else{
        if(a.x>this._barRight){
            d=this._barWidth
            }else{
            d=a.x-this._barLeft+1
            }
        }
    if(a.y<this._barTop){
    b=0
    }else{
    if(a.y>this._barBottom){
        b=this._barHeight
        }else{
        b=a.y-this._barTop+1
        }
    }
var f=parseInt(d/this._barWidth*this.settings.xMaxValue);
var c=parseInt(b/this._barHeight*this.settings.yMaxValue);
this.xValue=f;
this.yValue=c;
if(this.settings.xMaxValue==this.settings.xMinValue){
    d=0
    }
    if(this.settings.yMaxValue==this.settings.yMinValue){
    b=0
    }
    this._setArrowPosition(d,b);
if(this.onValuesChanged){
    this.onValuesChanged(this)
    }
}
};/*
ColorPicker
Copyright (c) 2007 John Dyer (http://johndyer.name)
MIT style license
*/
if(!window.Refresh){
    Refresh={}
    }
    if(!Refresh.Web){
    Refresh.Web={}
    }
    Refresh.Web.DefaultColorPickerSettings={
    startMode:"h",
    startHex:"ff0000",
    clientFilesPath:"images/"
};

Refresh.Web.ColorPicker=Class.create();
Refresh.Web.ColorPicker.prototype={
    initialize:function(d,b){
        this.id=d;
        this.settings=Object.extend(Object.extend({},Refresh.Web.DefaultColorPickerSettings),b||{});
        this._hueRadio=$(this.id+"_HueRadio");
        this._saturationRadio=$(this.id+"_SaturationRadio");
        this._valueRadio=$(this.id+"_BrightnessRadio");
        this._redRadio=$(this.id+"_RedRadio");
        this._greenRadio=$(this.id+"_GreenRadio");
        this._blueRadio=$(this.id+"_BlueRadio");
        this._hueRadio.value="h";
        this._saturationRadio.value="s";
        this._valueRadio.value="v";
        this._redRadio.value="r";
        this._greenRadio.value="g";
        this._blueRadio.value="b";
        this._event_onRadioClicked=this._onRadioClicked.bindAsEventListener(this);
        Event.observe(this._hueRadio,"click",this._event_onRadioClicked);
        Event.observe(this._saturationRadio,"click",this._event_onRadioClicked);
        Event.observe(this._valueRadio,"click",this._event_onRadioClicked);
        Event.observe(this._redRadio,"click",this._event_onRadioClicked);
        Event.observe(this._greenRadio,"click",this._event_onRadioClicked);
        Event.observe(this._blueRadio,"click",this._event_onRadioClicked);
        this._preview=$(this.id+"_Preview");
        this._mapBase=$(this.id+"_ColorMap");
        this._mapBase.style.width="256px";
        this._mapBase.style.height="256px";
        this._mapBase.style.padding=0;
        this._mapBase.style.margin=0;
        this._mapBase.style.border="solid 1px #000";
        this._mapBase.style.position="relative";
        this._mapL1=new Element("img",{
            src:this.settings.clientFilesPath+"blank.gif",
            width:256,
            height:256
        });
        this._mapL1.style.margin="0px";
        this._mapL1.style.display="block";
        this._mapBase.appendChild(this._mapL1);
        this._mapL2=new Element("img",{
            src:this.settings.clientFilesPath+"blank.gif",
            width:256,
            height:256
        });
        this._mapBase.appendChild(this._mapL2);
        this._mapL2.style.clear="both";
        this._mapL2.style.margin="-256px 0px 0px 0px";
        this._mapL2.setOpacity(0.5);
        this._mapL2.style.display="block";
        this._bar=$(this.id+"_ColorBar");
        this._bar.style.width="20px";
        this._bar.style.height="256px";
        this._bar.style.padding=0;
        this._bar.style.margin="0px 10px";
        this._bar.style.border="solid 1px #000";
        this._bar.style.position="relative";
        this._barL1=new Element("img",{
            src:this.settings.clientFilesPath+"blank.gif",
            width:20,
            height:256
        });
        this._barL1.style.margin="0px";
        this._barL1.style.display="block";
        this._bar.appendChild(this._barL1);
        this._barL2=new Element("img",{
            src:this.settings.clientFilesPath+"blank.gif",
            width:20,
            height:256
        });
        this._barL2.style.margin="-256px 0px 0px 0px";
        this._barL2.style.display="block";
        this._bar.appendChild(this._barL2);
        this._barL3=new Element("img",{
            src:this.settings.clientFilesPath+"blank.gif",
            width:20,
            height:256
        });
        this._barL3.style.margin="-256px 0px 0px 0px";
        this._barL3.style.backgroundColor="#ff0000";
        this._barL3.style.display="block";
        this._bar.appendChild(this._barL3);
        this._barL4=new Element("img",{
            src:this.settings.clientFilesPath+"bar-brightness.png",
            width:20,
            height:256
        });
        this._barL4.style.margin="-256px 0px 0px 0px";
        this._barL4.style.display="block";
        this._bar.appendChild(this._barL4);
        this._map=new Refresh.Web.Slider(this._mapL2,{
            xMaxValue:255,
            yMinValue:255,
            arrowImage:this.settings.clientFilesPath+"mappoint.gif"
            },this._mapBase);
        this._slider=new Refresh.Web.Slider(this._barL4,{
            xMinValue:1,
            xMaxValue:1,
            yMinValue:255,
            arrowImage:this.settings.clientFilesPath+"rangearrows.gif"
            },this._bar);
        this._cvp=new Refresh.Web.ColorValuePicker(this.id);
        var c=this;
        this._slider.onValuesChanged=function(){
            c.sliderValueChanged()
            };
            
        this._map.onValuesChanged=function(){
            c.mapValueChanged()
            };
            
        this._cvp.onValuesChanged=function(){
            c.textValuesChanged()
            };
            
        this.isLessThanIE7=false;
        var a=parseFloat(navigator.appVersion.split("MSIE")[1]);
        if((a<7)&&(document.body.filters)){
            this.isLessThanIE7=true
            }
            this.setColorMode(this.settings.startMode);
        if(this.settings.startHex){
            this._cvp._hexInput.value=this.settings.startHex
            }
            this._cvp.setValuesFromHex();
        this.positionMapAndSliderArrows();
        this.updateVisuals();
        this.color=null
        },
    show:function(){
        this._map.Arrow.style.display="";
        this._slider.Arrow.style.display="";
        this._map.setPositioningVariables();
        this._slider.setPositioningVariables();
        this.positionMapAndSliderArrows()
        },
    hide:function(){
        this._map.Arrow.style.display="none";
        this._slider.Arrow.style.display="none"
        },
    _onRadioClicked:function(a){
        this.setColorMode(a.target.value)
        },
    _onWebSafeClicked:function(a){
        this.setColorMode(this.ColorMode)
        },
    textValuesChanged:function(){
        this.positionMapAndSliderArrows();
        this.updateVisuals()
        },
    setColorMode:function(b){
        this.color=this._cvp.color;
        function a(d,c){
            d.setAlpha(c,100);
            c.style.backgroundColor="";
            c.src=d.settings.clientFilesPath+"blank.gif";
            c.style.filter=""
            }
            a(this,this._mapL1);
        a(this,this._mapL2);
        a(this,this._barL1);
        a(this,this._barL2);
        a(this,this._barL3);
        a(this,this._barL4);
        this._hueRadio.checked=false;
        this._saturationRadio.checked=false;
        this._valueRadio.checked=false;
        this._redRadio.checked=false;
        this._greenRadio.checked=false;
        this._blueRadio.checked=false;
        switch(b){
            case"h":
                this._hueRadio.checked=true;
                this._mapL1.style.backgroundColor="#"+Refresh.Web.ColorMethods.normalizeHex(this.color.hex);
                this._mapL2.style.backgroundColor="transparent";
                this.setImg(this._mapL2,this.settings.clientFilesPath+"map-hue.png");
                this.setAlpha(this._mapL2,100);
                this.setImg(this._barL4,this.settings.clientFilesPath+"bar-hue.png");
                this._map.settings.xMaxValue=100;
                this._map.settings.yMaxValue=100;
                this._slider.settings.yMaxValue=359;
                break;
            case"s":
                this._saturationRadio.checked=true;
                this.setImg(this._mapL1,this.settings.clientFilesPath+"map-saturation.png");
                this.setImg(this._mapL2,this.settings.clientFilesPath+"map-saturation-overlay.png");
                this.setAlpha(this._mapL2,0);
                this.setBG(this._barL3,this.color.hex);
                this.setImg(this._barL4,this.settings.clientFilesPath+"bar-saturation.png");
                this._map.settings.xMaxValue=359;
                this._map.settings.yMaxValue=100;
                this._slider.settings.yMaxValue=100;
                break;
            case"v":
                this._valueRadio.checked=true;
                this.setBG(this._mapL1,"000");
                this.setImg(this._mapL2,this.settings.clientFilesPath+"map-brightness.png");
                this._barL3.style.backgroundColor="#"+Refresh.Web.ColorMethods.normalizeHex(this.color.hex);
                this.setImg(this._barL4,this.settings.clientFilesPath+"bar-brightness.png");
                this._map.settings.xMaxValue=359;
                this._map.settings.yMaxValue=100;
                this._slider.settings.yMaxValue=100;
                break;
            case"r":
                this._redRadio.checked=true;
                this.setImg(this._mapL2,this.settings.clientFilesPath+"map-red-max.png");
                this.setImg(this._mapL1,this.settings.clientFilesPath+"map-red-min.png");
                this.setImg(this._barL4,this.settings.clientFilesPath+"bar-red-tl.png");
                this.setImg(this._barL3,this.settings.clientFilesPath+"bar-red-tr.png");
                this.setImg(this._barL2,this.settings.clientFilesPath+"bar-red-br.png");
                this.setImg(this._barL1,this.settings.clientFilesPath+"bar-red-bl.png");
                break;
            case"g":
                this._greenRadio.checked=true;
                this.setImg(this._mapL2,this.settings.clientFilesPath+"map-green-max.png");
                this.setImg(this._mapL1,this.settings.clientFilesPath+"map-green-min.png");
                this.setImg(this._barL4,this.settings.clientFilesPath+"bar-green-tl.png");
                this.setImg(this._barL3,this.settings.clientFilesPath+"bar-green-tr.png");
                this.setImg(this._barL2,this.settings.clientFilesPath+"bar-green-br.png");
                this.setImg(this._barL1,this.settings.clientFilesPath+"bar-green-bl.png");
                break;
            case"b":
                this._blueRadio.checked=true;
                this.setImg(this._mapL2,this.settings.clientFilesPath+"map-blue-max.png");
                this.setImg(this._mapL1,this.settings.clientFilesPath+"map-blue-min.png");
                this.setImg(this._barL4,this.settings.clientFilesPath+"bar-blue-tl.png");
                this.setImg(this._barL3,this.settings.clientFilesPath+"bar-blue-tr.png");
                this.setImg(this._barL2,this.settings.clientFilesPath+"bar-blue-br.png");
                this.setImg(this._barL1,this.settings.clientFilesPath+"bar-blue-bl.png");
                break;
            default:
                alert("invalid mode");
                break
                }
                switch(b){
            case"h":case"s":case"v":
                this._map.settings.xMinValue=1;
                this._map.settings.yMinValue=1;
                this._slider.settings.yMinValue=1;
                break;
            case"r":case"g":case"b":
                this._map.settings.xMinValue=0;
                this._map.settings.yMinValue=0;
                this._slider.settings.yMinValue=0;
                this._map.settings.xMaxValue=255;
                this._map.settings.yMaxValue=255;
                this._slider.settings.yMaxValue=255;
                break
                }
                this.ColorMode=b;
        this.positionMapAndSliderArrows();
        this.updateMapVisuals();
        this.updateSliderVisuals()
        },
    mapValueChanged:function(){
        switch(this.ColorMode){
            case"h":
                this._cvp._saturationInput.value=this._map.xValue;
                this._cvp._valueInput.value=100-this._map.yValue;
                break;
            case"s":
                this._cvp._hueInput.value=this._map.xValue;
                this._cvp._valueInput.value=100-this._map.yValue;
                break;
            case"v":
                this._cvp._hueInput.value=this._map.xValue;
                this._cvp._saturationInput.value=100-this._map.yValue;
                break;
            case"r":
                this._cvp._blueInput.value=this._map.xValue;
                this._cvp._greenInput.value=256-this._map.yValue;
                break;
            case"g":
                this._cvp._blueInput.value=this._map.xValue;
                this._cvp._redInput.value=256-this._map.yValue;
                break;
            case"b":
                this._cvp._redInput.value=this._map.xValue;
                this._cvp._greenInput.value=256-this._map.yValue;
                break
                }
                switch(this.ColorMode){
            case"h":case"s":case"v":
                this._cvp.setValuesFromHsv();
                break;
            case"r":case"g":case"b":
                this._cvp.setValuesFromRgb();
                break
                }
                this.updateVisuals()
        },
    sliderValueChanged:function(){
        switch(this.ColorMode){
            case"h":
                this._cvp._hueInput.value=360-this._slider.yValue;
                break;
            case"s":
                this._cvp._saturationInput.value=100-this._slider.yValue;
                break;
            case"v":
                this._cvp._valueInput.value=100-this._slider.yValue;
                break;
            case"r":
                this._cvp._redInput.value=255-this._slider.yValue;
                break;
            case"g":
                this._cvp._greenInput.value=255-this._slider.yValue;
                break;
            case"b":
                this._cvp._blueInput.value=255-this._slider.yValue;
                break
                }
                switch(this.ColorMode){
            case"h":case"s":case"v":
                this._cvp.setValuesFromHsv();
                break;
            case"r":case"g":case"b":
                this._cvp.setValuesFromRgb();
                break
                }
                this.updateVisuals()
        },
    positionMapAndSliderArrows:function(){
        this.color=this._cvp.color;
        var b=0;
        switch(this.ColorMode){
            case"h":
                b=360-this.color.h;
                break;
            case"s":
                b=100-this.color.s;
                break;
            case"v":
                b=100-this.color.v;
                break;
            case"r":
                b=255-this.color.r;
                break;
            case"g":
                b=255-this.color.g;
                break;
            case"b":
                b=255-this.color.b;
                break
                }
                this._slider.yValue=b;
        this._slider.setArrowPositionFromValues();
        var a=0;
        var c=0;
        switch(this.ColorMode){
            case"h":
                a=this.color.s;
                c=100-this.color.v;
                break;
            case"s":
                a=this.color.h;
                c=100-this.color.v;
                break;
            case"v":
                a=this.color.h;
                c=100-this.color.s;
                break;
            case"r":
                a=this.color.b;
                c=256-this.color.g;
                break;
            case"g":
                a=this.color.b;
                c=256-this.color.r;
                break;
            case"b":
                a=this.color.r;
                c=256-this.color.g;
                break
                }
                this._map.xValue=a;
        this._map.yValue=c;
        this._map.setArrowPositionFromValues()
        },
    updateVisuals:function(){
        this.updatePreview();
        this.updateMapVisuals();
        this.updateSliderVisuals();
        if(this.updateColorZilla){
            this.updateColorZilla()
            }
        },
updatePreview:function(){
    try{
        this._preview.style.backgroundColor="#"+Refresh.Web.ColorMethods.normalizeHex(this._cvp.color.hex)
        }catch(a){}
},
updateMapVisuals:function(){
    this.color=this._cvp.color;
    switch(this.ColorMode){
        case"h":
            var a=new Refresh.Web.Color({
            h:this.color.h,
            s:100,
            v:100
        });
        this.setBG(this._mapL1,a.hex);
            break;
        case"s":
            this.setAlpha(this._mapL2,100-this.color.s);
            break;
        case"v":
            this.setAlpha(this._mapL2,this.color.v);
            break;
        case"r":
            this.setAlpha(this._mapL2,this.color.r/256*100);
            break;
        case"g":
            this.setAlpha(this._mapL2,this.color.g/256*100);
            break;
        case"b":
            this.setAlpha(this._mapL2,this.color.b/256*100);
            break
            }
        },
updateSliderVisuals:function(){
    this.color=this._cvp.color;
    switch(this.ColorMode){
        case"h":
            break;
        case"s":
            var a=new Refresh.Web.Color({
            h:this.color.h,
            s:100,
            v:this.color.v
            });
        this.setBG(this._barL3,a.hex);
            break;
        case"v":
            var e=new Refresh.Web.Color({
            h:this.color.h,
            s:this.color.s,
            v:100
        });
        this.setBG(this._barL3,e.hex);
            break;
        case"r":case"g":case"b":
            var h=0;
            var c=0;
            if(this.ColorMode=="r"){
            h=this._cvp._blueInput.value;
            c=this._cvp._greenInput.value
            }else{
            if(this.ColorMode=="g"){
                h=this._cvp._blueInput.value;
                c=this._cvp._redInput.value
                }else{
                if(this.ColorMode=="b"){
                    h=this._cvp._redInput.value;
                    c=this._cvp._greenInput.value
                    }
                }
        }
        var b=(h/256)*100;
    var d=(c/256)*100;
    var g=((256-h)/256)*100;
    var f=((256-c)/256)*100;
    this.setAlpha(this._barL4,(d>g)?g:d);
    this.setAlpha(this._barL3,(d>b)?b:d);
    this.setAlpha(this._barL2,(f>b)?b:f);
    this.setAlpha(this._barL1,(f>g)?g:f);
    break
    }
},
setBG:function(a,d){
    try{
        a.style.backgroundColor="#"+Refresh.Web.ColorMethods.normalizeHex(d)
        }catch(b){}
},
setImg:function(a,b){
    if(b.indexOf("png")&&this.isLessThanIE7){
        a.pngSrc=b;
        a.src=this.settings.clientFilesPath+"blank.gif";
        a.style.filter="progid:DXImageTransform.Microsoft.AlphaImageLoader(src='"+b+"');"
        }else{
        a.src=b
        }
    },
setAlpha:function(b,a){
    if(this.isLessThanIE7){
        var c=b.pngSrc;
        if(c!=null&&c.indexOf("map-hue")==-1){
            b.style.filter="progid:DXImageTransform.Microsoft.AlphaImageLoader(src='"+c+"') progid:DXImageTransform.Microsoft.Alpha(opacity="+a+")"
            }
        }else{
    b.setOpacity(a/100)
    }
}
};