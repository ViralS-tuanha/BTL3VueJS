<template>
    <div class="container-fluid">
        <div>
            <router-link :to="{ name: 'home' }">Home</router-link>
        </div>
        <div class="row">
            <div class="col-md-2">
                <ul>
                    <li>
                        <router-link :to="{ name: 'store' }">Quan ly kho</router-link>
                    </li>
                    <li>
                        <router-link :to="{ name: 'product' }">Quan ly san pham</router-link>
                    </li>
                    <li>
                        <router-link :to="{ name: 'user' }">Quan ly tai khoan</router-link>
                    </li>
                </ul>
            </div>
            <div class="col-md-10">
                <router-view></router-view>
            </div>
        </div>
    </div>
</template>
<script>


export default {
    components:{
    }
}
</script>