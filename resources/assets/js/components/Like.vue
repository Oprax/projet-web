<template>
    <span v-on:click="toggle()" style="cursor: pointer;">
        <i :class="is_like ? 'thumbs up green icon' : 'thumbs up icon'"></i>
        {{ likes }} J'aime
    </span>
</template>

<script>
    export default {
      props: {
        'userId': {
          required: true
        },
        'likableId' : {
          required: true
        },
        'likes': {
          required: true
        },
        'type': {
          type: String,
          required: true
        }
      },
      data () {
        return {
          'is_like': false,
          'is_created': false,
          'lid': 0
        }
      },
      methods: {
        toggle () {
          let that = this;
          if (this.is_like) {
            axios.delete('/api/likes/' + this.lid)
              .then(function () {
                that.is_like = false;
                that.likes--;
              });
          } else {
            axios.post('/api/likes', {
              'user_id': that.userId,
              'likable_id': that.likableId,
              'likable_type': that.type
            }).then(function (response) {
                if (response.status === 200) {
                  that.lid = response.data.id;
                  that.is_like = true;
                  that.likes++;
                }
              });
          }
        }
      },
      mounted () {
        let p = {
          type: this.type
        };
        if (this.likableId > 0) {
          p.fid = this.likableId;
        }
        if (this.userId > 0) {
          p.uid = this.userId;
        }
        let that = this;
        axios.get('/api/likes', {params: p})
          .then(function (response) {
            if (response.status === 200) {
              that.lid = response.data[0].id;
              that.is_like = true
            }
            if (response.status === 400) {
              that.is_like = false
            }
          })
          .catch(function (error) {
            console.log(error);
          })
      }
    }
</script>