<template>
    <table class="table table-striped table-hover">
        <thead>
        <tr>
            <th>#</th>

            <th>Location Name</th>

            <th>Package Weight</th>

            <th></th>
        </tr>
        </thead>

        <tbody>
        <tr v-for="(row, index) in rows">
            <td class="table__cell table__element center-content align-middle">{{ index+1 }}</td>

            <td class="align-middle">
                <label class="sr-only">Location Name</label>
                <div class="input-group mr-2">
                    <div class="input-group-addon"><em class="fa fa-map-marker"></em></div>
                    <deployment-table-gmap-input v-model="row.name" :name="`name-${index}`"></deployment-table-gmap-input>
                </div>
            </td>

            <td class="align-middle">
                <label class="sr-only">Package Weight</label>
                <div class="input-group mr-2">
                    <input class="table__input form-control" placeholder="Package Weight" :name="`weight-${index}`" type="text" v-model.number="row.weight">
                    <div class="input-group-addon">kg</div>
                </div>
            </td>

            <td class="align-middle">
                <button type="button" class="table__element delete-row btn btn-link" @click="removeRow(index)" :disabled="calcRow()">
                    <em class="fa fa-trash"></em>
                </button>
            </td>
        </tr>
        <tr>
            <td class="text-center" colspan="4" @click="addRow()">
                <span class="table__element create-row">Add Row</span>   
            </td>
        </tr>
        </tbody>
    </table>
</template>

<style lang="scss" scoped>
//variables
$lighter-gray: #dfdfdf;
$white: #fff;
$dark-gray: #444444;

$font-medium: 1.2rem;

//table layout
.table__cell{
    &.center-content{
        text-align: center;
    }
}

.table__input{
    //usable on mobile
    min-width: 10em;
}

//table controls
.table__element{
    font-size: $font-medium;
    color: $dark-gray;
    &.delete-row{
        .fa:hover {
            color: #ef4040;
        }
    }
    &.create-row{
        .fa:hover {
            color: #8ad919;
        }
    }
}
</style>

 <script>
export default {
    data() {
        return {
            rows: [
                {
                name: '',
                weight: ''
                }
            ]
        }
    },
    props: ['name','weight'],
    methods: {
        calcRow(){
            if(this.rows.length > 1){
                return false;
            }
            else{
                return true;
            }
        },
        addRow(){

            this.rows.push({
                name: '',
                weight: ''
            })

        },
        removeRow(index) {
            this.rows.splice(index, 1);
        },
    }
}
</script>