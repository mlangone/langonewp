"use strict";function _typeof(t){return(_typeof="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function t(e){return typeof e}:function t(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e})(t)}function _get(t,e,n){return(_get="undefined"!=typeof Reflect&&Reflect.get?Reflect.get:function t(e,n,o){var r=_superPropBase(e,n);if(r){var i=Object.getOwnPropertyDescriptor(r,n);return i.get?i.get.call(o):i.value}})(t,e,n||t)}function _superPropBase(t,e){for(;!Object.prototype.hasOwnProperty.call(t,e)&&null!==(t=_getPrototypeOf(t)););return t}function _objectSpread(t){for(var e=1;e<arguments.length;e++){var n=null!=arguments[e]?arguments[e]:{},o=Object.keys(n);"function"==typeof Object.getOwnPropertySymbols&&(o=o.concat(Object.getOwnPropertySymbols(n).filter(function(t){return Object.getOwnPropertyDescriptor(n,t).enumerable}))),o.forEach(function(e){_defineProperty(t,e,n[e])})}return t}function _defineProperty(t,e,n){return e in t?Object.defineProperty(t,e,{value:n,enumerable:!0,configurable:!0,writable:!0}):t[e]=n,t}function _classCallCheck(t,e){if(!(t instanceof e))throw new TypeError("Cannot call a class as a function")}function _defineProperties(t,e){for(var n=0;n<e.length;n++){var o=e[n];o.enumerable=o.enumerable||!1,o.configurable=!0,"value"in o&&(o.writable=!0),Object.defineProperty(t,o.key,o)}}function _createClass(t,e,n){return e&&_defineProperties(t.prototype,e),n&&_defineProperties(t,n),t}function _possibleConstructorReturn(t,e){return!e||"object"!==_typeof(e)&&"function"!=typeof e?_assertThisInitialized(t):e}function _getPrototypeOf(t){return(_getPrototypeOf=Object.setPrototypeOf?Object.getPrototypeOf:function t(e){return e.__proto__||Object.getPrototypeOf(e)})(t)}function _assertThisInitialized(t){if(void 0===t)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");return t}function _inherits(t,e){if("function"!=typeof e&&null!==e)throw new TypeError("Super expression must either be null or a function");t.prototype=Object.create(e&&e.prototype,{constructor:{value:t,writable:!0,configurable:!0}}),e&&_setPrototypeOf(t,e)}function _setPrototypeOf(t,e){return(_setPrototypeOf=Object.setPrototypeOf||function t(e,n){return e.__proto__=n,e})(t,e)}!function(t,e){function n(t){if(!wp||!wp.blocks||!wp.blocks.registerBlockType)return!1;var e=t.post_types||[],n;if(e.length){e.push("wp_block");var o=acf.screen.getPostType();if(-1===e.indexOf(o))return!1}if("string"==typeof t.icon&&"<svg"===t.icon.substr(0,4)){var r=t.icon;t.icon=React.createElement(u,{html:r})}return t=acf.parseArgs(t,{title:"",name:"",category:"",attributes:{id:{type:"string"},data:{type:"object"},name:{type:"string"},align:{type:"string"},mode:{type:"string"}},edit:function t(e){return React.createElement(l,e)},save:function t(){return null}}),s[t.name]=t,wp.blocks.registerBlockType(t.name,t)}function o(){var t=acf.get("blockTypes");t&&t.map(n)}function r(t){return s[t]||!1}function i(t){var e=wp.data.select("core/editor").getBlocks();for(var n in t)e=e.filter(function(e){return e.attributes[n]===t[n]});return e}function a(e,n){return t.ajax({url:acf.get("ajaxurl"),dataType:"json",type:"post",cache:!1,data:acf.prepareForAjax({action:"acf/ajax/fetch-block",block:JSON.stringify(e),query:n})})}function c(t){var e=[],n=t.nodeName.toLowerCase();for(var o in wp.editor)o.toLowerCase()===n&&(n=wp.editor[o]);return e[0]=n,e[1]={},[].slice.call(t.attributes).forEach(function(t){var n=t.name,o=t.value;n="class"===n?"className":n,e[1][n]=o}),[].slice.call(t.childNodes).forEach(function(t){if(t instanceof Text){var n=t.textContent.trim();n&&e.push(n)}else e.push(c(t))}),React.createElement.apply(this,e)}var s={};acf.addAction("ready",o),acf.parseJSX=function(t){return c(t[0])};var l=function(t){function e(t){var n;return _classCallCheck(this,e),(n=_possibleConstructorReturn(this,_getPrototypeOf(e).call(this,t))).setAttributes=n.setAttributes.bind(_assertThisInitialized(n)),n.setup(),n}return _inherits(e,t),_createClass(e,[{key:"setup",value:function t(){function e(t){-1===t.indexOf(a.mode)&&(a.mode=t[0])}var n=this.props,o=n.name,a=n.attributes,c=r(o),s;a.id?i({id:a.id}).length>1&&(a.id=acf.uniqid("block_")):(a.id=acf.uniqid("block_"),a.name=c.name,a.mode=a.mode||c.mode,a.align=a.align||c.align,a.data=a.data||c.data);"edit"===c.mode?e(["edit","preview"]):"preview"===c.mode?e(["preview","edit"]):e(["auto"])}},{key:"setAttributes",value:function t(e){this.props.setAttributes(e)}},{key:"render",value:function t(){function e(){c({mode:"preview"===s?"edit":"preview"})}var n=this.props,o=n.name,i=n.attributes,a=n.isSelected,c=n.setAttributes,s=i.mode;if(!i.id)return console.log("NO ID!"),null;var l=r(o),u=wp.element.Fragment,p=wp.editor,f=p.BlockControls,y=p.InspectorControls,m=wp.components,b=m.Toolbar,v=m.IconButton,_=m.PanelBody,g=m.Button,k=l.supports.mode;"auto"===s&&(k=!1);var w="preview"===s?acf.__("Switch to Edit"):acf.__("Switch to Preview"),O="preview"===s?"edit":"welcome-view-site";return React.createElement(u,null,React.createElement(f,null,k&&React.createElement(b,null,React.createElement(v,{className:"components-icon-button components-toolbar__control",label:w,icon:O,onClick:e}))),React.createElement(y,null,React.createElement("div",{className:"acf-block-component acf-block-panel"},React.createElement("div",{className:"acf-block-panel-actions"},k&&React.createElement(g,{className:"button",onClick:e},w)),"preview"===s&&React.createElement(d,this.props))),React.createElement("div",{className:"acf-block-component acf-block-body"},"auto"===s&&a?React.createElement(d,this.props):"auto"!==s||a?"preview"===s?React.createElement(h,this.props):React.createElement(d,this.props):React.createElement(h,this.props)))}}]),e}(React.Component),u=function(t){function e(){return _classCallCheck(this,e),_possibleConstructorReturn(this,_getPrototypeOf(e).apply(this,arguments))}return _inherits(e,t),_createClass(e,[{key:"render",value:function t(){return React.createElement("div",{dangerouslySetInnerHTML:{__html:this.props.html}})}}]),e}(React.Component),p={},f=function(e){function n(t){var e;return _classCallCheck(this,n),(e=_possibleConstructorReturn(this,_getPrototypeOf(n).call(this,t))).setup(t),e.data=e.getData({html:"",$el:!1,init:!1}),e}return _inherits(n,e),_createClass(n,[{key:"setup",value:function t(e){this.id=""}},{key:"getData",value:function t(e){return p[this.id]||e}},{key:"setData",value:function t(e){this.data=p[this.id]=_objectSpread({},this.data,e)}},{key:"setHtml",value:function e(n){var o;if((n=n.trim())!==this.datahtml){var r=t(n);this.setData((_defineProperty(o={html:n,$el:r},"$el",r),_defineProperty(o,"init",!1),o)),this.display()}}},{key:"render",value:function t(){var e=this,n=wp.components,o=n.Placeholder,r=n.Spinner;return React.createElement("div",{ref:function t(n){return e.el=n}},React.createElement(o,null,React.createElement(r,null)))}},{key:"display",value:function e(){t(this.el).html(this.data.$el),this.data.init?this.componentDidRemount():(this.setData({init:!0}),this.componentDidInitialize()),this.componentDidRender()}},{key:"componentDidMount",value:function t(){var e=!!this.data.$el;this.props.reusableBlock&&(e=!1),e?this.display():this.fetch()}},{key:"componentDidInitialize",value:function t(){acf.doAction("append",this.data.$el)}},{key:"componentWillUnmount",value:function t(){acf.doAction("unmount",this.data.$el)}},{key:"componentDidRemount",value:function t(){acf.doAction("remount",this.data.$el),acf.doAction("refresh",this.data.$el)}},{key:"componentDidRender",value:function t(){}},{key:"fetch",value:function t(){}}]),n}(React.Component),d=function(t){function e(){return _classCallCheck(this,e),_possibleConstructorReturn(this,_getPrototypeOf(e).apply(this,arguments))}return _inherits(e,t),_createClass(e,[{key:"setup",value:function t(e){this.id="BlockForm-".concat(e.attributes.id)}},{key:"fetch",value:function t(){var e=this,n;a(this.props.attributes,{form:!0}).done(function(t){e.setHtml(t.data.form)})}},{key:"componentDidInitialize",value:function t(){_get(_getPrototypeOf(e.prototype),"componentDidInitialize",this).call(this);var n=this.props,o=n.attributes,r=n.setAttributes,i=this.data.$el,a=!1;i.on("change keyup",function(t){clearTimeout(a),a=setTimeout(function(){r({data:acf.serialize(i,"acf-".concat(o.id))})},300)})}}]),e}(f),h=function(t){function e(){return _classCallCheck(this,e),_possibleConstructorReturn(this,_getPrototypeOf(e).apply(this,arguments))}return _inherits(e,t),_createClass(e,[{key:"setup",value:function t(e){this.id="BlockPreview-".concat(e.attributes.id)}},{key:"fetch",value:function t(){var e=this,n=this.props.attributes;this.setData({attributes:n}),a(n,{preview:!0}).done(function(t){e.setHtml(t.data.preview)})}},{key:"componentDidUpdate",value:function t(e){var n,o;JSON.stringify(e.attributes)!==JSON.stringify(this.props.attributes)&&this.fetch()}},{key:"componentDidRender",value:function t(){_get(_getPrototypeOf(e.prototype),"componentDidRender",this).call(this),acf.doAction("render_block_preview",this.data.$el,this.props.attributes)}},{key:"componentDidRemount",value:function t(){var n,o;_get(_getPrototypeOf(e.prototype),"componentDidRemount",this).call(this),JSON.stringify(this.data.attributes)!==JSON.stringify(this.props.attributes)&&this.fetch()}}]),e}(f)}(jQuery);
//# sourceMappingURL=acf-pro-blocks.js.map