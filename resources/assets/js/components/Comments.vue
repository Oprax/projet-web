<template>
    <div>
        <div class="ui segment" v-if="comments.length === 0">
            <div class="ui active inverted dimmer">
                <div class="ui text loader">Loading</div>
            </div>
            <div>&nbsp;</div>
            <div>&nbsp;</div>
        </div>
        <div class="ui comments" v-if="comments.length !== 0">
            <h3 class="ui dividing header">Commentaires de la photo :</h3>
            <div class="comment" v-for="comment in comments" :key="comment.id">
                <a :href="'/user/' + comment.user_id" class="avatar">
                    <img :src="comment.user.avatar">
                </a>
                <div class="content">
                    <a class="author" :href="'/user/' + comment.user_id" >
                        {{ comment.user.name }} {{ comment.user.forename }}
                    </a>
                    <div class="metadata" :title="comment.created_at">
                        <span class="date">{{ comment.created_at.fromNow() }}</span>
                    </div>
                    <div class="text">
                        {{ comment.content }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import moment from 'moment-timezone'
    export default {
      props: {
        'type': {
          type: String,
          required: true
        },
        'fid': {
          default: 0
        }
      },
      data () {
        return {
          comments: []
        }
      },
      mounted () {
        let that = this;
        let p = {
          type: this.type
        }
        if (this.fid > 0) {
          p.fid = this.fid
        }
        axios.get('/api/comments', {params: p})
        .then(function (response) {
          for (var comment of response.data) {
            comment.created_at = moment(comment.created_at).tz('Europe/Paris')
            that.comments.push(comment)
          }
        })
      }
    }
</script>
