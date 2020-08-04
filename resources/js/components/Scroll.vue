<template>
	<div class="scroll">
		<a href="#banner" class="AnimateScrollLink"><i class="fa fa-angle-up"></i></a>
	</div>
</template>
<script>
export default {
	data() {
		return {
			
		}
	},
// не подключилась здесь в компоненте анимация. ошибки типа не видит эту библиотеку. никак вообще не получилось, пока тупо не поставил вариант, как было в макете. Потому что там jquery, и она непонятно для меня вызывается. 
}
</script>
<style lang="scss">
.scroll {
    position: fixed;
    right: 30px;
    bottom: 30px;
    opacity: 0;
    -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";
    -webkit-transition: opacity .25s ease-in-out;
            transition: opacity .25s ease-in-out;
    z-index: 1;
}

body.scrolled .scroll {
    opacity: 1;
    -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=100)";
}

.scroll a {
		display: inline-block;
		min-width: 50px;
		height: 50px;
		background-color: #f9f9f9;
		border: 1px solid black;;
    font-size: 28px;
		color: #303030;
    text-align: center;
}
</style>