<!-- Global Confirmation Modal -->
<div 
    x-data="{ 
        show: false, 
        message: '', 
        confirmCallback: null,
        confirmText: 'Confirm',
        cancelText: 'Cancel',
        type: 'danger',
        open(msg, callback, options = {}) {
            this.message = msg;
            this.confirmCallback = callback;
            this.confirmText = options.confirmText || 'Confirm';
            this.cancelText = options.cancelText || 'Cancel';
            this.type = options.type || 'danger';
            this.show = true;
        },
        confirm() {
            if (this.confirmCallback) this.confirmCallback();
            this.show = false;
        }
    }"
    x-show="show"
    x-on:confirm-action.window="open($event.detail.message, $event.detail.callback, $event.detail.options || {})"
    class="fixed inset-0 z-[99999] overflow-y-auto"
    x-cloak
>
    <!-- Overlay -->
    <div 
        x-show="show"
        x-transition:enter="ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="ease-in duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed inset-0 bg-stone-900/50 backdrop-blur-sm transition-opacity"
    ></div>

    <!-- Modal Content -->
    <div class="flex min-h-screen items-center justify-center p-4 text-center sm:p-0">
        <div 
            x-show="show"
            x-transition:enter="ease-out duration-300"
            x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
            x-transition:leave="ease-in duration-200"
            x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
            x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            class="relative transform overflow-hidden rounded-2xl bg-white dark:bg-boxdark text-left shadow-2xl transition-all sm:my-8 sm:w-full sm:max-w-lg"
            @click.outside="show = false"
        >
            <div class="px-6 pt-6 pb-4">
                <div class="sm:flex sm:items-start">
                    <div 
                        :class="{
                            'bg-red-100 text-red-600': type === 'danger',
                            'bg-amber-100 text-amber-600': type === 'warning',
                            'bg-blue-100 text-blue-600': type === 'info',
                            'bg-emerald-100 text-emerald-600': type === 'success'
                        }"
                        class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-xl sm:mx-0 sm:h-10 sm:w-10"
                    >
                        <i x-data x-init="$nextTick(() => lucide.createIcons())" :data-lucide="type === 'danger' ? 'alert-triangle' : (type === 'warning' ? 'alert-circle' : (type === 'success' ? 'check-circle' : 'info'))" class="h-6 w-6"></i>
                    </div>
                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                        <h3 class="text-lg font-bold leading-6 text-stone-900 dark:text-white" x-text="type === 'danger' ? 'Confirm Action' : 'Are you sure?'"></h3>
                        <div class="mt-2">
                            <p class="text-sm text-stone-500 dark:text-gray-400" x-text="message"></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-stone-50 dark:bg-gray-800/50 px-6 py-4 sm:flex sm:flex-row-reverse gap-3 font-medium">
                <button 
                    type="button" 
                    @click="confirm()"
                    :class="{
                        'bg-red-600 hover:bg-red-700': type === 'danger',
                        'bg-amber-600 hover:bg-amber-700': type === 'warning',
                        'bg-blue-600 hover:bg-blue-700': type === 'info',
                        'bg-emerald-600 hover:bg-emerald-700': type === 'success'
                    }"
                    class="inline-flex w-full justify-center rounded-xl px-5 py-2.5 text-sm text-white shadow-sm transition-all sm:w-auto"
                    x-text="confirmText"
                ></button>
                <button 
                    type="button" 
                    @click="show = false"
                    class="mt-3 inline-flex w-full justify-center rounded-xl border border-stone-200 bg-white px-5 py-2.5 text-sm text-stone-700 shadow-sm transition-all hover:bg-stone-50 dark:border-strokedark dark:bg-boxdark dark:text-white sm:mt-0 sm:w-auto"
                    x-text="cancelText"
                ></button>
            </div>
        </div>
    </div>
</div>

<script>
    window.confirmAction = function(message, callback, options = {}) {
        window.dispatchEvent(new CustomEvent('confirm-action', {
            detail: { message, callback, options }
        }));
    };
</script>
