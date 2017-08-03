<template>
    <div class="input-group color-picker-component">
        <input type="text"
               class="form-control"
               title="Color Picker"
               :value="'#CCCCCC'"
               @focus="showPicker(item)"
               @blur="displayPicker = false"
               @change="updateFromInput"
        />
        <span class="input-group-addon color-picker-container">
            <span class="current-color"
                  :style="'background-color: #CCCCCC'"
                  @click="showPicker(item)"
            ></span>
            <chrome-picker :value="colors" @input="updateValue" v-if="displayPicker"></chrome-picker>
        </span>
    </div>
</template>

<script>

    var Chrome = require('vue-color/src/components/Chrome.vue');




    export default {
        data() {
            return {
                colors: defaultProps,
                displayPicker: false,
            }
        },
        computed: {
            bgc () {
                return this.colors.hex
            }
        },
        methods: {
            onOk () {
                console.log('ok')
            },
            onCancel () {
                console.log('cancel')
            },

            updateValue (value) {
                this.editForm.SERVICE_COLOR = value.hex;
            },

            updateFromInput(){

            },

            showPicker() {
                this.displayPicker = true;
            },

            updateFromPicker(value) {
                this.editForm.SERVICE_COLOR = value.hex;
                console.log('changed by picker');
            },


        },
        components: {
            'chrome-picker': Chrome,
        },

        created () {
        }
    }

</script>

<style lang="scss">
    .color-picker-component{
        .current-color {
            display: inline-block;
            width: 16px;
            height: 16px;
            background-color: #000;
            cursor: pointer;
        }

        .vue-color__chrome {
            position: absolute;
            left: 0;
            top: calc(100% + 10px);
            z-index: 100;
        }
    }

    * {
        margin: 0;
        padding: 0;
    }
    html {
        font-family: 'Source Sans Pro', 'Helvetica Neue', Arial, sans-serif;
    }
    .header-container {
        position: relative;
    }
    .header-bg {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        min-height: 580px;
        background-color: #333;
        opacity: 0.5;
        z-index: 0;
    }
    .header {
        display: flex;
        max-width: 780px;
        margin: 0 auto;
        padding: 20px 0;
    }
    .intro-wrap {
        flex: 1;
        margin-right: 100px;
    }
    .intro {
        width: 300px;
        color: rgba(0, 0, 0, 0.65098);
    }
    .intro > h1 {
        font-size: 40px;
        font-weight: normal;
        line-height: 60px;
    }
    .intro > p {
        font-size: 16px;
        font-weight: normal;
        line-height: 22px;
    }
    .demo-container {
        max-width: 780px;
        min-height: 800px;
        margin: 0 auto;
        position: relative;
        z-index: 2;
    }
    .demo-list {
        display: flex;
        margin-bottom: 20px;
    }
    .demo-item {
        position: relative;
        margin-bottom: 10px;
        margin: 0 10px 0 10px;
        z-index: 2;
    }
    .demo-item h6 {
        margin: 0;
        padding: 5px 0;
        color: #666;
    }
</style>

