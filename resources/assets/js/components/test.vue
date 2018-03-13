<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Example Component</div>

                    <div class="panel-body">
                        <ul>
                            <li v-for="name in names" v-text="name"></li>
                        </ul>

                        <input type="text" v-model="newName">
                        <button v-on:click="addName">Add Name</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
    data() {
        return {

            newName: '',

            names: ['Joe', 'Mary']
        }
    },

    methods: {
        addName() {
            this.names.push(this.newName);
        }
    }
}
</script>