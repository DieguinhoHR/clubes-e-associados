<template>
    <div>
        <h4>
            <span class="glyphicon glyphicon-sort-by-alphabet"></span> Clubes
        </h4>

        <hr>

        <table class="table table table-striped table-hover">
            <thead>
                <th>ID:</th>
                <th>Nome</th>
                <th>Ações:</th>
                <th colspan="2"></th>
            </thead>

            <tbody>
                <tr v-for="clube in list">
                    <td>{{ clube.id }}</td>
                    <td>{{ clube.nome }}</td>
                    <td>
                        <button type="submit" class="btn btn-danger">
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

    export default {
        data() {
          return {
              clubes:[],
          }
        },
        props: ['clubesProp'],
        computed: {
            list() {
                this.clubes = JSON.parse(this.clubesProp)

                return orderBy(this.clubes, 'id')
            }

        },
   }
</script>
