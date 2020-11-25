"use strict";

(function ($) {
  // console.log(sfxexchangerates_plugin_url);
  // console.log(sfxexchangerates_process_admin_url);
  console.log("admin-vue");

  var _body = $("body");
  /* 
          Vue.component('', {
              data: function () {
                  return {};
              },
              props: [],
              template: ``,
              created() {},
              computed: {},
              mounted() {},
              watch: {},
              methods: {},
          });
   */


  Vue.component('vue-element', {
    data: function data() {
      return {
        "title": "",
        "value": "",
        "added": [],
        "extra": [],
        "extraValues": []
      };
    },
    props: ["inputId", "inputName", "placeholder", "titlePlaceholder", "load", "addTitle", "isTitle", "extraValue"],
    template: "\n        <div>\n        <input type=\"hidden\" value=\"\" :name=\"inputName\">\n\n\n        <input v-if=\"isTitle\" type=\"text\" :id=\"inputId+'-title'\" :placeholder=\"titlePlaceholder\" v-model=\"title\" class=\"sfxinput\">\n\n\n        <input type=\"text\" :id=\"inputId+'-value'\" :placeholder=\"placeholder\" v-model=\"value\" @keydown.enter.prevent=\"add\" class=\"sfxinput\">\n\n\n        <div v-for=\"(v,k) in extra\">\n        <input type=\"text\" :id=\"inputId+'-value-'+k\" :placeholder=\"placeholder\" v-model=\"extraValues[k]\" class=\"sfxinput\">\n        </div>\n\n\n        <button type=\"button\" class=\"button button-primary sfx-add-button\" @click.prevent=\"add\">{{addTitle}}</button>\n        <br>\n\n        <div :id=\"'sfx-elements-'+inputId\" class=\"sortable\">\n        <div v-for=\"(v,k) in added\" :k=\"k\" class=\"sfxelement\">\n\n        {{v.title}}\n\n        \n        <input type=\"hidden\" :value=\"v.title\" :name=\"generateName(k,'title')\">\n        <input type=\"hidden\" :value=\"v.value\" :name=\"generateName(k,'value')\">\n\n        <span v-for=\"(vv,kk) in v.extras\">\n        <input type=\"hidden\" :value=\"vv\" :name=\"generateName(k,'extras][')\">\n        </span>\n\n        <button type=\"button\" class=\"button button-danger float-right\" @click=\"remove(k)\">x</button>\n\n        <div class=\"clearfix\"></div>\n        </div>\n        </div>\n\n\n        </div>\n        ",
    created: function created() {
      if (this.extraValue) {
        // console.log(this.extraValue);
        for (var index = 0; index < this.extraValue; index++) {
          this.extra[index] = {};
        } // console.log(this.extra);

      }

      if (typeof window[this.load] == "undefined") return;
      var obj = JSON.parse(window[this.load]);
      if (!obj) return; // console.log(obj);

      this.added = obj;
    },
    computed: {},
    mounted: function mounted() {},
    watch: {},
    methods: {
      generateName: function generateName(key, name) {
        return this.inputName + '[' + key + '][' + name + ']';
      },
      add: function add(e) {
        if (!$.trim(this.value)) return; // console.log(this.isTitle);

        if (!this.title) this.title = this.value; // var key = sfxexchangerates_idGenerate();

        var ADD = {
          title: this.title,
          value: this.value
        };
        if (this.extraValues) ADD.extras = this.extraValues; // console.log(this.extraValues);

        this.added.push(ADD);
        this.title = "";
        this.value = "";
      },
      remove: function remove(k) {
        this.added.splice(k, 1);
      }
    }
  }); //---------

  var gen = $(".vue-gen"); // console.log(vues.length);

  if (gen.length) {
    for (var index = 0; index < gen.length; index++) {
      // console.log(vues[index]);
      new Vue({
        el: gen[index],
        data: {
          // message: "hello " + index,
          loading: false
        },
        created: function created() {
          this.loading = true;
        }
      });
    }
  }
})(jQuery);