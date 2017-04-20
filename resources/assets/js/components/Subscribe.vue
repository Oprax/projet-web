<template>
    <div v-on:click="toggle()">
        <div class="ui animated button" v-if="is_subscribe">
            <div class="hidden content">
                Se désinscrire !
            </div>
            <div class="visible content">
                <i class="users icon"></i>
                {{ subscribes }} participants
            </div>
        </div>
        <div class="ui primary button" v-if="!is_subscribe">
            S'inscire !
        </div>
    </div>
</template>

<script>
    export default {
      props: {
        'uid': {
          required: true
        },
        'fid' : {
          required: true
        }
      },
      data () {
        return {
          'is_subscribe': false,
          'subscribes': 0,
          'sid': 0
        }
      },
      methods: {
        toggle () {
          let that = this;
          if (this.is_subscribe) {
            axios.delete('/api/subscribes/' + this.sid)
              .then(function () {
                that.is_subscribe = false;
                that.subscribes--;
              });
          } else {
            axios.post('/api/subscribes', {
              'user_id': that.uid,
              'activity_id': that.fid
            }).then(function (response) {
                if (response.status === 200) {
                  that.sid = response.data.id;
                  that.is_subscribe = true;
                  that.subscribes++;
                }
              });
          }
        }
      },
      mounted () {
        let that = this;
        axios.get('/api/subscribes', {
          params: {
            fid: this.fid
          }
        }).then(function (response) {
          that.$set(that, 'subscribes', response.data.length)
        });

        axios.get('/api/subscribes', {
          params: {
            fid: this.fid,
            uid: this.uid
          }
        }).then(function (response) {
            if (response.data.length > 0) {
              that.sid = response.data[0].id;
              that.is_subscribe = true
            }
            if (response.data.length === 0) {
              that.is_subscribe = false
            }
          })
          .catch(function (error) {
            console.log(error);
          })
      }
    }
</script>