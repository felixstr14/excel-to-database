<template>
    <div>
        <div class="d-flex justify-content-center">
            <button class="mt-2 btn btn-warning" @click="tutorialControll(true)">Tutorial</button>
        </div>
        <div v-show="show">
            <div class="modal" tabindex="-1" role="dialog" style="background: grey">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title"><b>Čo všetko program dokáže</b></h5>
                            <button type="button" class="close" aria-label="Close" @click="tutorialControll(false)" @keydown.esc="tutorialControll(false)">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div>
                                <p class="text-custom">
                                Program slúži na prenos údajov z Excelu do vopred definovanej databázy.
                                <br><br>
                                <b>V databáze je tabuľka žiaci, ktorá obsahuje 4 stĺpce:</b>
                                </p>
                                <ul>
                                    <li>Meno</li>
                                    <li>Priezvisko</li>
                                    <li>Štipendium</li>
                                    <li>Číslo isic</li>
                                </ul>
                                <p class="text-custom">
                                    <b>Program dokáže validovať či:</b>
                                </p>
                                <ul>
                                    <li>sme vložili súbor</li>
                                    <li>sme vložili správny súbor (.xls alebo .xlsx)</li>
                                    <li>sú dáta v tabuľke správne</li>
                                    <li>sa v tabuľke nenachádza duplikátny študent (na základe čísla ISICU)</li>
                                </ul>
                                <p class="text-custom">
                                    Program dokáže vypisovať chybné hlášky na červenom pozadí a success hlášky na zelenom pozadí.
                                    <br> <br>
                                    <i>Hádam už sme na nič nezabudli, ak ešte niečo nájdete, čo to dokáže, bude to easter-egg. :)</i>
                                </p>
                            </div>
                        </div>
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
            show: false,
        }
    },
    methods: {
        tutorialControll: function(boolean)  {
            this.show = boolean;
        }
    }
}
</script>

<style scoped>
    .modal {
        display: block;
    }
    .text-custom {
        font-size: 16px;
    }
</style>
