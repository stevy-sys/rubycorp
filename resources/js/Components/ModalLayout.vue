<template>
    <div class="inset-0 flex items-center justify-center">
        <slot name="button"></slot>
    </div>
    <TransitionRoot appear :show="props?.isOpen" as="template">
      <Dialog as="div" @close="closeModal" class="relative z-[9999]">
        <TransitionChild
          as="template"
          enter="duration-300 ease-out"
          enter-from="opacity-0"
          enter-to="opacity-100"
          leave="duration-200 ease-in"
          leave-from="opacity-100"
          leave-to="opacity-0"
        >
          <div class="fixed inset-0 bg-black/25 backdrop-blur-md" />
        </TransitionChild>
  
        <div class="fixed inset-0 overflow-y-auto">
          <div
            class="flex min-h-full items-center justify-center p-4 text-center"
          >
            <TransitionChild
              as="template"
              enter="duration-300 ease-out"
              enter-from="opacity-0 scale-95"
              enter-to="opacity-100 scale-100"
              leave="duration-200 ease-in"
              leave-from="opacity-100 scale-100"
              leave-to="opacity-0 scale-95"
            >
              <DialogPanel
                :class="classes"
                class=" transform overflow-hidden rounded-2xl p-6 text-left align-middle shadow-xl transition-all"
              >
                <DialogTitle
                  as="h3"
                  class="text-lg font-medium leading-6 text-gray-900"
                >
                <slot name="header"></slot>
                </DialogTitle>
                <div class="mt-2">
                    <slot name="content"></slot>
                </div>
                
                <div class="mt-4">
                    <slot name="footer"></slot>
                </div>
              </DialogPanel>
            </TransitionChild>
          </div>
        </div>
      </Dialog>
    </TransitionRoot>
  </template>
  
  <script setup>
  import { ref } from 'vue'
  import {
    TransitionRoot,
    TransitionChild,
    Dialog,
    DialogPanel,
    DialogTitle,
  } from '@headlessui/vue'

  const props = defineProps({
    isOpen:{
        type:Boolean,
        default:false
    },
    classes:{
        type:String,
        default:'bg-red-400 text-white w-full max-w-md'
    }
  })
  
  function closeModal() {
    isOpen.value = false
  }
  </script>
  