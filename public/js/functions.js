function Asombrire(idElement){
       // Asombrire()
   //import { Modal } from 'flowbite';


    // set the modal menu element
    const $targetEl= document.getElementById(idElement);

    // options with default values
    const options= {
        placement: 'bottom-right',
        backdrop: 'dynamic',
        backdropClasses:
            'bg-gray-900/100 dark:bg-gray-900/80 fixed inset-0 z-40',
        closable: true,
        onHide: () => {
            console.log('modal is hidden');
        },
        onShow: () => {
            console.log('modal is shown');
        },
        onToggle: () => {
            console.log('modal has been toggled');
        },
    };

    // instance options object
    const instanceOptions = {
    id: idElement,
    override: true
    };


    /*
    * $targetEl: required
    * options: optional
    */
    const modal = new Modal($targetEl, options, instanceOptions);
    
}