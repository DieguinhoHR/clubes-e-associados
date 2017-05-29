<template>
    <div>
        <h4>
            <span class="glyphicon glyphicon-sort-by-alphabet"></span> Clubes
        </h4>

        <div class="well">
            <input type="text" class="form-control" placholder="Filtrar a lista abaixo" v-model="filterTerm">
        </div>

        <hr>

        <table class="table table table-striped table-hover">
            <thead>
                <th>ID:</th>
                <th>Nome</th>
                <th>Ações:</th>
                <th colspan="2"></th>
            </thead>

            <tbody>
                <tr v-for="clube in clubes">
                    <td v-text="clube.id"></td>
                    <td v-text="clube.nome"></td>
                    <td>
                        <button type="submit" class="btn btn-danger" @click.prevent="onDelete(clube)">
                            Excluir
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    import { orderBy } from 'lodash'
    import axios from 'axios'

    export default {
        data() {
          return {
              clubes:[],
              filterTerm: ''
          }
        },
        props: ['clubesProp'],

        methods: {
            onSave(clube) {
              console.log('saved')
            },
            onDelete(clube) {
                axios.delete('/clubes/' + clube.id, clube)
                     .then((response) =>
                         this.clubes.splice(clube, 1))
                     .catch((respose) => alert('Nenhuma registro encontrado'))

            }
        },
        mounted () {
            this.clubes = JSON.parse(this.clubesProp)

            return orderBy(this.clubes, 'id')
        },
   }
</script>
