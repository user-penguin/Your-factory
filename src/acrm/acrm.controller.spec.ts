import { Test, TestingModule } from '@nestjs/testing';
import { AcrmController } from './acrm.controller';

describe('Acrm Controller', () => {
  let controller: AcrmController;

  beforeEach(async () => {
    const module: TestingModule = await Test.createTestingModule({
      controllers: [AcrmController],
    }).compile();

    controller = module.get<AcrmController>(AcrmController);
  });

  it('should be defined', () => {
    expect(controller).toBeDefined();
  });
});
