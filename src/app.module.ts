import { Module } from '@nestjs/common';
import { AppController } from './app.controller';
import { AppService } from './app.service';
import { AcrmController } from './acrm/acrm.controller';

@Module({
  imports: [],
  controllers: [AppController, AcrmController],
  providers: [AppService],
})
export class AppModule {}
