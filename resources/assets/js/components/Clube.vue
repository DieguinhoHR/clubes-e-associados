<template>
    <div>
        <h4>
            <span class="glyphicon glyphicon-sort-by-alphabet"></span> Cadastro de Clube
        </h4>


        <input type="text" class="form-control" id="nome" name="nome" v-model="nome">
        <button type="submit" class="btn btn-primary" @click="onSave()">Salvar</button>

        <h4>
            <span class="glyphicon glyphicon-sort-by-alphabet"></span> Clubes
        </h4>

        <div class="well">
            <input type="text" class="form-control" placholder="Filtrar a lista abaixo" v-model="search" @keyup="onSearch()">
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
    import axios from 'axios'

    export default {
        data() {
          return {
              clubes:[],
              nome: '',
              search: ''
          }
        },
        props: ['clubesProp'],

        methods: {
            onSearch() {
              axios.get('/clubes/' + this.search)
                   .then((response) =>
                       this.clubes = response.data.model.data)
                   .catch((respose) => alert('Nenhuma registro encontrado'))
            },
            onSave() {
              axios.post('/clubes', {
                nome: this.nome
              })
              .then((response) =>
                  this.clubes.push(response.data))
              .catch((respose) => alert('Não foi possivel inserir um registro'))
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


        },
   }
</script>
