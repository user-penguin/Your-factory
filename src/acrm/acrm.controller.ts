import { Controller, Get } from '@nestjs/common';

@Controller('acrm')
export class AcrmController {
    @Get()
    firstMethod() : string {
        return 'AcrContol works!';
    }

}
