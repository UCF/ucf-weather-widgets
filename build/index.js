(()=>{"use strict";var e,t={786:()=>{const e=window.wp.blocks,t=window.React,r=window.wp.i18n,n=window.wp.blockEditor,l=window.wp.components,a=JSON.parse('{"UU":"ucf/ucf-weather-widgets"}');(0,e.registerBlockType)(a.UU,{edit:function({attributes:e,setAttributes:a}){const{longitude:o,latitude:i}=e;return(0,t.createElement)(t.Fragment,null,(0,t.createElement)(n.InspectorControls,null,(0,t.createElement)(l.Panel,null,(0,t.createElement)(l.PanelBody,{title:(0,r.__)("Map Widget Settings","ucf-weather-widgets"),icon:"admin-plugins"},(0,t.createElement)(l.TextControl,{label:(0,r.__)("Longitude","ucf-weather-widgets"),help:(0,r.__)("The longitude of the area to display weather for."),onChange:e=>a({longitude:e}),value:o}),(0,t.createElement)(l.TextControl,{label:(0,r.__)("Latitude","ucf-weather-widgets"),help:(0,r.__)("The latitude of the area to display weather for."),onChange:e=>a({latitude:e}),value:i})))),",",(0,t.createElement)("div",{...(0,n.useBlockProps)()},(0,t.createElement)("p",null,"Longitude: ",o),(0,t.createElement)("p",null,"Latitude: ",i)))}})}},r={};function n(e){var l=r[e];if(void 0!==l)return l.exports;var a=r[e]={exports:{}};return t[e](a,a.exports,n),a.exports}n.m=t,e=[],n.O=(t,r,l,a)=>{if(!r){var o=1/0;for(c=0;c<e.length;c++){for(var[r,l,a]=e[c],i=!0,u=0;u<r.length;u++)(!1&a||o>=a)&&Object.keys(n.O).every((e=>n.O[e](r[u])))?r.splice(u--,1):(i=!1,a<o&&(o=a));if(i){e.splice(c--,1);var s=l();void 0!==s&&(t=s)}}return t}a=a||0;for(var c=e.length;c>0&&e[c-1][2]>a;c--)e[c]=e[c-1];e[c]=[r,l,a]},n.o=(e,t)=>Object.prototype.hasOwnProperty.call(e,t),(()=>{var e={57:0,350:0};n.O.j=t=>0===e[t];var t=(t,r)=>{var l,a,[o,i,u]=r,s=0;if(o.some((t=>0!==e[t]))){for(l in i)n.o(i,l)&&(n.m[l]=i[l]);if(u)var c=u(n)}for(t&&t(r);s<o.length;s++)a=o[s],n.o(e,a)&&e[a]&&e[a][0](),e[a]=0;return n.O(c)},r=globalThis.webpackChunkucf_weather_widgets=globalThis.webpackChunkucf_weather_widgets||[];r.forEach(t.bind(null,0)),r.push=t.bind(null,r.push.bind(r))})();var l=n.O(void 0,[350],(()=>n(786)));l=n.O(l)})();