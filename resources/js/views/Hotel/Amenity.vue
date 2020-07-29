<template>
  <div>
    <v-card class="pa-2" outlined tile>
      <!--Contenido del card-->
      <!--AMENIDADES-->
      <div v-if="hotel!==null">
        <v-banner single-line>
          <div class="flexed">
            <v-icon class="iconsInformation" left>mdi-tag-multiple</v-icon>
            <h3>Amenidades</h3>
          </div>
        </v-banner>
        <div class="pa-4">
          <v-col cols="12" sm="6" md="12">
            <v-expansion-panels focusable accordion multiple>
              <v-expansion-panel>
                <v-expansion-panel-header color="#1565c0">
                  <strong>Informacion del edificio</strong>
                </v-expansion-panel-header>
                <v-expansion-panel-content>
                  <v-row no-gutters>
                    <v-col cols="6" style="margin-bottom: 1%">
                      <v-card outlined style="padding: 5%; margin-right: 7%; display: flex">
                        <span class="d-flex align-center" style="margin-right: 5%">
                          <strong>Numero de habitaciones</strong>
                        </span>
                        <v-text-field  class="ml-auto" v-model="amenities.num_rooms" required></v-text-field>
                      </v-card>
                    </v-col>
                    <v-col cols="6" style="margin-bottom: 1%">
                      <v-card outlined style="padding: 5%; display: flex">
                        <span class="d-flex align-center" style="margin-right: 5%">
                          <strong>Numero de pisos</strong>
                        </span>
                        <v-text-field class="ml-auto" v-model="amenities.num_floors" required></v-text-field>
                      </v-card>
                    </v-col>
                  </v-row>
                </v-expansion-panel-content>
              </v-expansion-panel>
            </v-expansion-panels>
            <br />
            <v-expansion-panels focusable accordion multiple>
              <v-expansion-panel>
                <v-expansion-panel-header color="#1565c0">
                  <strong>Servicios destacados</strong>
                </v-expansion-panel-header>
                <v-expansion-panel-content>
                  <v-row no-gutters>
                    <v-col cols="6" style="margin-bottom: 1%">
                      <v-card outlined style="padding: 5%; margin-right: 7%; display: flex">
                        <span class="d-flex align-center" style="margin-right: 5%">
                          <strong>Spa</strong>
                        </span>
                        <v-autocomplete class="ml-auto" :items="spaItems" v-model="ddwnSpa" dense filled></v-autocomplete>
                      </v-card>
                    </v-col>
                    <v-col cols="6" style="margin-bottom: 1%">
                      <v-card outlined style="padding: 5%; display: flex">
                        <span class="d-flex align-center" style="margin-right: 5%">
                          <strong>Aire acondicionado</strong>
                        </span>
                        <v-switch class="ml-auto" v-model="swAirConditioned" inset></v-switch>
                        <!--<CarrouselRestaurant></CarrouselRestaurant>-->
                      </v-card>
                    </v-col>
                    <v-col cols="6" style="margin-bottom: 1%">
                      <v-card outlined style="padding: 5%; margin-right: 7%; display: flex">
                        <span class="d-flex align-center" style="margin-right: 5%">
                          <strong>Habitaciones libres de humo de tabaco</strong>
                        </span>
                        <v-switch class="ml-auto" v-model="swNoSmokeRooms" inset></v-switch>
                      </v-card>
                    </v-col>
                    <v-col cols="6" style="margin-bottom: 1%">
                      <v-card outlined style="padding: 5%; display: flex">
                        <span class="d-flex align-center" style="margin-right: 5%">
                          <strong>Servicio por traslado a aeropuerto(transfer)</strong>
                        </span>
                        <v-switch class="ml-auto" v-model="swAirTransferService" inset></v-switch>
                      </v-card>
                    </v-col>
                    <v-col cols="6" style="margin-bottom: 1%">
                      <v-card outlined style="padding: 5%; margin-right: 7%; display: flex">
                        <span class="d-flex align-center" style="margin-right: 5%">
                          <strong>Servicio por traslado a hotel(collect)</strong>
                        </span>
                        <v-switch class="ml-auto" v-model="swAirCollectService" inset></v-switch>
                      </v-card>
                    </v-col>
                    <v-col cols="6" style="margin-bottom: 1%">
                      <v-card outlined style="padding: 5%; display: flex">
                        <span class="d-flex align-center" style="margin-right: 5%">
                          <strong>Recepcion las 24 horas</strong>
                        </span>
                        <v-switch class="ml-auto" v-model="swRecection_24h" inset></v-switch>
                      </v-card>
                    </v-col>
                    <v-col cols="6" style="margin-bottom: 1%">
                      <v-card outlined style="padding: 5%; margin-right: 7%; display: flex">
                        <span class="d-flex align-center" style="margin-right: 5%">
                          <strong>Gimnasio</strong>
                        </span>
                        <v-switch class="ml-auto" v-model="swGym" inset></v-switch>
                      </v-card>
                    </v-col>
                    <v-col cols="6" style="margin-bottom: 1%">
                      <v-card outlined style="padding: 5%; display: flex">
                        <span class="d-flex align-center" style="margin-right: 5%">
                          <strong>Servicio a la habitación</strong>
                        </span>
                        <v-switch class="ml-auto" v-model="swRoomService" inset></v-switch>
                      </v-card>
                    </v-col>
                    <v-col cols="6" style="margin-bottom: 1%">
                      <v-card outlined style="padding: 5%; margin-right: 7%; display: flex">
                        <span class="d-flex align-center" style="margin-right: 5%">
                          <strong>Terraza</strong>
                        </span>
                        <v-switch class="ml-auto" v-model="swTerrace" inset></v-switch>
                      </v-card>
                    </v-col>
                    <v-col cols="6" style="margin-bottom: 1%">
                      <v-card outlined style="padding: 5%; display: flex">
                        <span class="d-flex align-center" style="margin-right: 5%">
                          <strong>Bar</strong>
                        </span>
                        <v-switch class="ml-auto" v-model="swBar" inset></v-switch>
                      </v-card>
                    </v-col>
                    <v-col cols="6" style="margin-bottom: 1%">
                      <v-card outlined style="padding: 5%; margin-right: 7%; display: flex">
                        <span class="d-flex align-center" style="margin-right: 5%">
                          <strong>Jardin</strong>
                        </span>
                        <v-switch class="ml-auto" v-model="swGarden" inset></v-switch>
                      </v-card>
                    </v-col>
                    <v-col cols="6" style="margin-bottom: 1%">
                      <v-card outlined style="padding: 5%; display: flex">
                        <span class="d-flex align-center" style="margin-right: 5%">
                          <strong>Parque acuatico</strong>
                        </span>
                        <v-autocomplete class="ml-auto" :items="acuaticItems" v-model="ddwnAcuatic" dense filled></v-autocomplete>
                      </v-card>
                    </v-col>
                  </v-row>
                </v-expansion-panel-content>
              </v-expansion-panel>
            </v-expansion-panels>
            <br />
            <v-expansion-panels focusable accordion multiple>
              <v-expansion-panel>
                <v-expansion-panel-header color="#1565c0">
                  <strong>Actividades</strong>
                </v-expansion-panel-header>
                <v-expansion-panel-content>
                  <v-row no-gutters>
                    <v-col cols="6" style="margin-bottom: 1%">
                      <v-card outlined style="padding: 5%; margin-right: 7%; display: flex">
                        <span class="d-flex align-center" style="margin-right: 5%">
                          <strong>Playa</strong>
                        </span>
                        <v-autocomplete class="ml-auto" :items="beachItems" v-model="ddwnBeach" dense filled></v-autocomplete>
                      </v-card>
                    </v-col>
                    <v-col cols="6" style="margin-bottom: 1%">
                      <v-card outlined style="padding: 5%; display: flex">
                        <span class="d-flex align-center" style="margin-right: 5%">
                          <strong>Actividades recreativas</strong>
                        </span>
                        <v-switch class="ml-auto" v-model="swRecreationalActivities" inset></v-switch>
                      </v-card>
                    </v-col>
                    <v-col cols="6" style="margin-bottom: 1%">
                      <v-card outlined style="padding: 5%; margin-right: 7%; display: flex">
                        <span class="d-flex align-center" style="margin-right: 5%">
                          <strong>Cena romantica</strong>
                        </span>
                        <v-autocomplete
                          class="ml-auto"
                          :items="romanticDItems"
                          v-model="ddwnRomanticD"
                          dense
                          filled
                        ></v-autocomplete>
                      </v-card>
                    </v-col>
                    <v-col cols="6" style="margin-bottom: 1%">
                      <v-card outlined style="padding: 5%; display: flex">
                        <span class="d-flex align-center" style="margin-right: 5%">
                          <strong>Tour turistico</strong>
                        </span>
                        <v-autocomplete
                          class="ml-auto"
                          :items="touristicTItems"
                          v-model="ddwnTouristicT"
                          dense
                          filled
                        ></v-autocomplete>
                      </v-card>
                    </v-col>
                  </v-row>
                </v-expansion-panel-content>
              </v-expansion-panel>
            </v-expansion-panels>
            <br />
            <v-expansion-panels focusable accordion multiple>
              <v-expansion-panel>
                <v-expansion-panel-header color="#1565c0">
                  <strong>Transporte</strong>
                </v-expansion-panel-header>
                <v-expansion-panel-content>
                  <v-row no-gutters>
                    <v-col cols="6" style="margin-bottom: 1%">
                      <v-card outlined style="padding: 5%; margin-right: 7%; display: flex">
                        <span class="d-flex align-center" style="margin-right: 5%">
                          <strong>Estacionamiento vigilado</strong>
                        </span>
                        <v-switch class="ml-auto" v-model="swGuardedParking" inset></v-switch>
                      </v-card>
                    </v-col>
                    <v-col cols="6" style="margin-bottom: 1%">
                      <v-card outlined style="padding: 5%; display: flex">
                        <span class="d-flex align-center" style="margin-right: 5%">
                          <strong>Estacionamiento en la calle</strong>
                        </span>
                        <v-switch class="ml-auto" v-model="swStreetParking" inset></v-switch>
                      </v-card>
                    </v-col>
                    <v-col cols="6" style="margin-bottom: 1%">
                      <v-card outlined style="padding: 5%; margin-right: 7%; display: flex">
                        <span class="d-flex align-center" style="margin-right: 5%">
                          <strong>Estacionamiento en un garaje</strong>
                        </span>
                        <v-switch class="ml-auto" v-model="swGarageParking" inset></v-switch>
                      </v-card>
                    </v-col>
                    <v-col cols="6" style="margin-bottom: 1%">
                      <v-card outlined style="padding: 5%; display: flex">
                        <span class="d-flex align-center" style="margin-right: 5%">
                          <strong>Estacionamiento adaptado para personas de movilidad reducida</strong>
                        </span>
                        <v-switch class="ml-auto" v-model="swSpecialParking" inset></v-switch>
                      </v-card>
                    </v-col>
                  </v-row>
                </v-expansion-panel-content>
              </v-expansion-panel>
            </v-expansion-panels>
            <br />
            <v-expansion-panels focusable accordion multiple>
              <v-expansion-panel>
                <v-expansion-panel-header color="#1565c0">
                  <strong>Servicios de recepcion</strong>
                </v-expansion-panel-header>
                <v-expansion-panel-content>
                  <v-row no-gutters>
                    <v-col cols="6" style="margin-bottom: 1%">
                      <v-card outlined style="padding: 5%; margin-right: 7%; display: flex">
                        <span class="d-flex align-center" style="margin-right: 5%">
                          <strong>Registro privado</strong>
                        </span>
                        <v-switch class="ml-auto" v-model="swReg_inout_private" inset></v-switch>
                      </v-card>
                    </v-col>
                    <v-col cols="6" style="margin-bottom: 1%">
                      <v-card outlined style="padding: 5%; display: flex">
                        <span class="d-flex align-center" style="margin-right: 5%">
                          <strong>Registro express</strong>
                        </span>
                        <v-switch class="ml-auto" v-model="swReg_inout_express" inset></v-switch>
                      </v-card>
                    </v-col>
                    <v-col cols="6" style="margin-bottom: 1%">
                      <v-card outlined style="padding: 5%; margin-right: 7%; display: flex">
                        <span class="d-flex align-center" style="margin-right: 5%">
                          <strong>Informacion turistica</strong>
                        </span>
                        <v-switch class="ml-auto" v-model="swTouristicInfo" inset></v-switch>
                      </v-card>
                    </v-col>
                    <v-col cols="6" style="margin-bottom: 1%">
                      <v-card outlined style="padding: 5%; display: flex">
                        <span class="d-flex align-center" style="margin-right: 5%">
                          <strong>Servicio de estacionamiento</strong>
                        </span>
                        <v-switch class="ml-auto" v-model="swParkingService" inset></v-switch>
                      </v-card>
                    </v-col>
                    <v-col cols="6" style="margin-bottom: 1%">
                      <v-card outlined style="padding: 5%; margin-right: 7%; display: flex">
                        <span class="d-flex align-center" style="margin-right: 5%">
                          <strong>Cambio de divisas</strong>
                        </span>
                        <v-switch class="ml-auto" v-model="swCurrencyChange" inset></v-switch>
                      </v-card>
                    </v-col>
                  </v-row>
                </v-expansion-panel-content>
              </v-expansion-panel>
            </v-expansion-panels>
            <br />
            <v-expansion-panels focusable accordion multiple>
              <v-expansion-panel>
                <v-expansion-panel-header color="#1565c0">
                  <strong>Zonas comunes</strong>
                </v-expansion-panel-header>
                <v-expansion-panel-content>
                  <v-row no-gutters>
                    <v-col cols="6" style="margin-bottom: 1%">
                      <v-card outlined style="padding: 5%; margin-right: 7%; display: flex">
                        <span class="d-flex align-center" style="margin-right: 5%">
                          <strong>Mobiliario exterior</strong>
                        </span>
                        <v-switch class="ml-auto" v-model="swOutdoorFurniture" inset></v-switch>
                      </v-card>
                    </v-col>
                    <v-col cols="6" style="margin-bottom: 1%">
                      <v-card outlined style="padding: 5%; display: flex">
                        <span class="d-flex align-center" style="margin-right: 5%">
                          <strong>Terraza/Solárium</strong>
                        </span>
                        <v-switch class="ml-auto" v-model="swTerraceSolarium" inset></v-switch>
                      </v-card>
                    </v-col>
                    <v-col cols="6" style="margin-bottom: 1%">
                      <v-card outlined style="padding: 5%; margin-right: 7%; display: flex">
                        <span class="d-flex align-center" style="margin-right: 5%">
                          <strong>Comedor compartido</strong>
                        </span>
                        <v-switch class="ml-auto" v-model="swSharedDinner" inset></v-switch>
                      </v-card>
                    </v-col>
                    <v-col cols="6" style="margin-bottom: 1%">
                      <v-card outlined style="padding: 5%; display: flex">
                        <span class="d-flex align-center" style="margin-right: 5%">
                          <strong>Salon compartido</strong>
                        </span>
                        <v-switch class="ml-auto" v-model="swSharedSalon" inset></v-switch>
                      </v-card>
                    </v-col>
                    <v-col cols="6" style="margin-bottom: 1%">
                      <v-card outlined style="padding: 5%; margin-right: 7%; display: flex">
                        <span class="d-flex align-center" style="margin-right: 5%">
                          <strong>Zona de juegos</strong>
                        </span>
                        <v-switch class="ml-auto" v-model="swGameZone" inset></v-switch>
                      </v-card>
                    </v-col>
                    <v-col cols="6" style="margin-bottom: 1%">
                      <v-card outlined style="padding: 5%; display: flex">
                        <span class="d-flex align-center" style="margin-right: 5%">
                          <strong>Biblioteca</strong>
                        </span>
                        <v-switch class="ml-auto" v-model="swLibrary" inset></v-switch>
                      </v-card>
                    </v-col>
                  </v-row>
                </v-expansion-panel-content>
              </v-expansion-panel>
            </v-expansion-panels>
            <br />
            <v-expansion-panels focusable accordion multiple>
              <v-expansion-panel>
                <v-expansion-panel-header color="#1565c0">
                  <strong>Servicios de limpieza</strong>
                </v-expansion-panel-header>
                <v-expansion-panel-content>
                  <v-row no-gutters>
                    <v-col cols="6" style="margin-bottom: 1%">
                      <v-card outlined style="padding: 5%; margin-right: 7%; display: flex">
                        <span class="d-flex align-center" style="margin-right: 5%">
                          <strong>Limpieza interna diaria</strong>
                        </span>
                        <v-autocomplete class="ml-auto" :items="dailyHItems" v-model="ddwnDailyH" dense filled></v-autocomplete>
                      </v-card>
                    </v-col>
                    <v-col cols="6" style="margin-bottom: 1%">
                      <v-card outlined style="padding: 5%; display: flex">
                        <span class="d-flex align-center" style="margin-right: 5%">
                          <strong>Servicio de lavanderia</strong>
                        </span>
                        <v-switch class="ml-auto" v-model="swLaundryService" inset></v-switch>
                      </v-card>
                    </v-col>
                    <v-col cols="6" style="margin-bottom: 1%">
                      <v-card outlined style="padding: 5%; margin-right: 7%; display: flex">
                        <span class="d-flex align-center" style="margin-right: 5%">
                          <strong>Servicio de planchado</strong>
                        </span>
                        <v-switch class="ml-auto" v-model="swIronService" inset></v-switch>
                      </v-card>
                    </v-col>
                  </v-row>
                </v-expansion-panel-content>
              </v-expansion-panel>
            </v-expansion-panels>
            <br />
            <v-expansion-panels focusable accordion multiple>
              <v-expansion-panel>
                <v-expansion-panel-header color="#1565c0">
                  <strong>Instalaciones de negocios</strong>
                </v-expansion-panel-header>
                <v-expansion-panel-content>
                  <v-row no-gutters>
                    <v-col cols="6" style="margin-bottom: 1%">
                      <v-card outlined style="padding: 5%; margin-right: 7%; display: flex">
                        <span class="d-flex align-center" style="margin-right: 5%">
                          <strong>Sala de reuniones</strong>
                        </span>
                        <v-switch class="ml-auto" v-model="swMeetingRoom" inset></v-switch>
                      </v-card>
                    </v-col>
                    <v-col cols="6" style="margin-bottom: 1%">
                      <v-card outlined style="padding: 5%; display: flex">
                        <span class="d-flex align-center" style="margin-right: 5%">
                          <strong>Centro de reuniones</strong>
                        </span>
                        <v-switch class="ml-auto" v-model="swMeetingCenter" inset></v-switch>
                      </v-card>
                    </v-col>
                    <v-col cols="6" style="margin-bottom: 1%">
                      <v-card outlined style="padding: 5%; margin-right: 7%; display: flex">
                        <span class="d-flex align-center" style="margin-right: 5%">
                          <strong>Fax/Fotocopiadora</strong>
                        </span>
                        <v-switch class="ml-auto" v-model="swFaxPhotocopier" inset></v-switch>
                      </v-card>
                    </v-col>
                  </v-row>
                </v-expansion-panel-content>
              </v-expansion-panel>
            </v-expansion-panels>
            <br />
            <v-expansion-panels focusable accordion multiple>
              <v-expansion-panel>
                <v-expansion-panel-header color="#1565c0">
                  <strong>Varios</strong>
                </v-expansion-panel-header>
                <v-expansion-panel-content>
                  <v-row no-gutters>
                    <v-col cols="6" style="margin-bottom: 1%">
                      <v-card outlined style="padding: 5%; margin-right: 7%; display: flex">
                        <span class="d-flex align-center" style="margin-right: 5%">
                          <strong>Descanso</strong>
                        </span>
                        <v-switch class="ml-auto" v-model="swCoffeeBreak" inset></v-switch>
                      </v-card>
                    </v-col>
                    <v-col cols="6" style="margin-bottom: 1%">
                      <v-card outlined style="padding: 5%; display: flex">
                        <span class="d-flex align-center" style="margin-right: 5%">
                          <strong>Tienda de recuerdos</strong>
                        </span>
                        <v-switch class="ml-auto" v-model="swSouvenirsStore" inset></v-switch>
                      </v-card>
                    </v-col>
                    <v-col cols="6" style="margin-bottom: 1%">
                      <v-card outlined style="padding: 5%; margin-right: 7%; display: flex">
                        <span class="d-flex align-center" style="margin-right: 5%">
                          <strong>Servicio para personas con capacidades reducidas</strong>
                        </span>
                        <v-switch class="ml-auto" v-model="swInclusiveService" inset></v-switch>
                      </v-card>
                    </v-col>
                    <v-col cols="6" style="margin-bottom: 1%">
                      <v-card outlined style="padding: 5%; display: flex">
                        <span class="d-flex align-center" style="margin-right: 5%">
                          <strong>Elevador</strong>
                        </span>
                        <v-switch class="ml-auto" v-model="swElevator" inset></v-switch>
                      </v-card>
                    </v-col>
                    <v-col cols="6" style="margin-bottom: 1%">
                      <v-card outlined style="padding: 5%; margin-right: 7%; display: flex">
                        <span class="d-flex align-center" style="margin-right: 5%">
                          <strong>Area para fumar</strong>
                        </span>
                        <v-switch class="ml-auto" v-model="swSmokingZone" inset></v-switch>
                      </v-card>
                    </v-col>
                    <v-col cols="6" style="margin-bottom: 1%">
                      <v-card outlined style="padding: 5%; display: flex">
                        <span class="d-flex align-center" style="margin-right: 5%">
                          <strong>No fumar</strong>
                        </span>
                        <v-switch class="ml-auto" v-model="swNoSmoking" inset></v-switch>
                      </v-card>
                    </v-col>
                    <v-col cols="6" style="margin-bottom: 1%">
                      <v-card outlined style="padding: 5%; margin-right: 7%; display: flex">
                        <span class="d-flex align-center" style="margin-right: 5%">
                          <strong>Pet friendly</strong>
                        </span>
                        <v-switch class="ml-auto" v-model="swPetFriendly" inset></v-switch>
                      </v-card>
                    </v-col>
                    <v-col cols="6" style="margin-bottom: 1%">
                      <v-card outlined style="padding: 5%; display: flex">
                        <span class="d-flex align-center" style="margin-right: 5%">
                          <strong>Casa para mascotas</strong>
                        </span>
                        <v-switch class="ml-auto" v-model="swPetHouse" inset></v-switch>
                      </v-card>
                    </v-col>
                    <v-col cols="6" style="margin-bottom: 1%">
                      <v-card outlined style="padding: 5%; margin-right: 7%; display: flex">
                        <span class="d-flex align-center" style="margin-right: 5%">
                          <strong>Pet basket</strong>
                        </span>
                        <v-switch class="ml-auto" v-model="swPetBasket" inset></v-switch>
                      </v-card>
                    </v-col>
                    <v-col cols="6" style="margin-bottom: 1%">
                      <v-card outlined style="padding: 5%; display: flex">
                        <span class="d-flex align-center" style="margin-right: 5%">
                          <strong>Solo adultos</strong>
                        </span>
                        <v-switch class="ml-auto" v-model="swOnlyAdults" inset></v-switch>
                      </v-card>
                    </v-col>
                    <v-col cols="6" style="margin-bottom: 1%">
                      <v-card outlined style="padding: 5%; margin-right: 7%; display: flex">
                        <span class="d-flex align-center" style="margin-right: 5%">
                          <strong>Habitaciones sanitizadas</strong>
                        </span>
                        <v-switch class="ml-auto" v-model="swSanitizedRooms" inset></v-switch>
                      </v-card>
                    </v-col>
                    <v-col cols="6" style="margin-bottom: 1%">
                      <v-card outlined style="padding: 5%; display: flex">
                        <span class="d-flex align-center" style="margin-right: 5%">
                          <strong>Suite nupcial</strong>
                        </span>
                        <v-switch class="ml-auto" v-model="swBridalSuite" inset></v-switch>
                      </v-card>
                    </v-col>
                    <v-col cols="6" style="margin-bottom: 1%">
                      <v-card outlined style="padding: 5%; margin-right: 7%; display: flex">
                        <span class="d-flex align-center" style="margin-right: 5%">
                          <strong>Servicio VIP</strong>
                        </span>
                        <v-switch class="ml-auto" v-model="swVipService" inset></v-switch>
                      </v-card>
                    </v-col>
                    <v-col cols="6" style="margin-bottom: 1%">
                      <v-card outlined style="padding: 5%; display: flex">
                        <span class="d-flex align-center" style="margin-right: 5%">
                          <strong>Calefacción</strong>
                        </span>
                        <v-switch class="ml-auto" v-model="swCalefaction" inset></v-switch>
                      </v-card>
                    </v-col>
                  </v-row>
                </v-expansion-panel-content>
              </v-expansion-panel>
            </v-expansion-panels>
            <br />
            <v-expansion-panels focusable accordion multiple>
              <v-expansion-panel>
                <v-expansion-panel-header color="#1565c0">
                  <strong>Seguridad</strong>
                </v-expansion-panel-header>
                <v-expansion-panel-content>
                  <v-row no-gutters>
                    <v-col cols="6" style="margin-bottom: 1%">
                      <v-card outlined style="padding: 5%; margin-right: 7%; display: flex">
                        <span class="d-flex align-center" style="margin-right: 5%">
                          <strong>Bolsas de seguridad</strong>
                        </span>
                        <v-switch class="ml-auto" v-model="swKeepBags" inset></v-switch>
                      </v-card>
                    </v-col>
                    <v-col cols="6" style="margin-bottom: 1%">
                      <v-card outlined style="padding: 5%; display: flex">
                        <span class="d-flex align-center" style="margin-right: 5%">
                          <strong>Seguridad las 24 horas</strong>
                        </span>
                        <v-switch class="ml-auto" v-model="swSecurity24h" inset></v-switch>
                      </v-card>
                    </v-col>
                    <v-col cols="6" style="margin-bottom: 1%">
                      <v-card outlined style="padding: 5%; margin-right: 7%; display: flex">
                        <span class="d-flex align-center" style="margin-right: 5%">
                          <strong>Alarma de seguridad</strong>
                        </span>
                        <v-switch class="ml-auto" v-model="swSecurityAlarm" inset></v-switch>
                      </v-card>
                    </v-col>
                    <v-col cols="6" style="margin-bottom: 1%">
                      <v-card outlined style="padding: 5%; display: flex">
                        <span class="d-flex align-center" style="margin-right: 5%">
                          <strong>Detectores de humo</strong>
                        </span>
                        <v-switch class="ml-auto" v-model="swSmookeDetectors" inset></v-switch>
                      </v-card>
                    </v-col>
                    <v-col cols="6" style="margin-bottom: 1%">
                      <v-card outlined style="padding: 5%; margin-right: 7%; display: flex">
                        <span class="d-flex align-center" style="margin-right: 5%">
                          <strong>Camaras de seguridad internas</strong>
                        </span>
                        <v-switch class="ml-auto" v-model="swInSecurityCams" inset></v-switch>
                      </v-card>
                    </v-col>
                    <v-col cols="6" style="margin-bottom: 1%">
                      <v-card outlined style="padding: 5%; display: flex">
                        <span class="d-flex align-center" style="margin-right: 5%">
                          <strong>Camaras de seguridad externas</strong>
                        </span>
                        <v-switch class="ml-auto" v-model="swOutSecurityCams" inset></v-switch>
                      </v-card>
                    </v-col>
                    <v-col cols="6" style="margin-bottom: 1%">
                      <v-card outlined style="padding: 5%; margin-right: 7%; display: flex">
                        <span class="d-flex align-center" style="margin-right: 5%">
                          <strong>Extintor de incendios</strong>
                        </span>
                        <v-switch class="ml-auto" v-model="swFireExtinguishers" inset></v-switch>
                      </v-card>
                    </v-col>
                    <v-col cols="6" style="margin-bottom: 1%">
                      <v-card outlined style="padding: 5%; display: flex">
                        <span class="d-flex align-center" style="margin-right: 5%">
                          <strong>Caja fuerte</strong>
                        </span>
                        <v-switch class="ml-auto" v-model="swSafeDepositBox" inset></v-switch>
                      </v-card>
                    </v-col>
                  </v-row>
                </v-expansion-panel-content>
              </v-expansion-panel>
            </v-expansion-panels>
          </v-col>
        </div>
      </div>
    </v-card>
  </div>
</template>

<script>
import { mapState } from "vuex";
import CarrouselRestaurant from "../../components/Hotel/CarrouselRestaurant";

export default {
  name: "Amenity",
  created() {
    if (this.amenities.spa != null) {
      if (this.amenities.spa == "free") {
        this.ddwnSpa = "Gratis";
      }
      if (this.amenities.spa == "paid") {
        this.ddwnSpa = "De Pago";
      }
      if (this.amenities.spa == "flag") {
        this.ddwnSpa = "Flag";
      }
    }
    if (this.amenities.water_park != null) {
      if (this.amenities.water_park == "free") {
        this.ddwnAcuatic = "Gratis";
      }
      if (this.amenities.water_park == "paid") {
        this.ddwnAcuatic = "De Pago";
      }
      if (this.amenities.water_park == "flag") {
        this.ddwnAcuatic = "Flag";
      }
    }
    if (this.amenities.beach != null) {
      if (this.amenities.beach == "private") {
        this.ddwnBeach = "Privada";
      }
      if (this.amenities.beach == "in front") {
        this.ddwnBeach = "En frente";
      }
      if (this.amenities.beach == "flag") {
        this.ddwnBeach = "Flag";
      }
    }
    if (this.amenities.romantic_dinners != null) {
      if (this.amenities.romantic_dinners == "free") {
        this.ddwnRomanticD = "Gratis";
      }
      if (this.amenities.romantic_dinners == "paid") {
        this.ddwnRomanticD = "De pago";
      }
      if (this.amenities.romantic_dinners == "flag") {
        this.ddwnRomanticD = "Flag";
      }
    }
    if (this.amenities.touristic_tour != null) {
      if (this.amenities.touristic_tour == "free") {
        this.ddwnTouristicT = "Gratis";
      }
      if (this.amenities.touristic_tour == "paid") {
        this.ddwnTouristicT = "De pago";
      }
      if (this.amenities.touristic_tour == "flag") {
        this.ddwnTouristicT = "Flag";
      }
    }
    if (this.amenities.daily_housekipping != null) {
      if (this.amenities.daily_housekipping == "free") {
        this.ddwnDailyH = "Gratis";
      }
      if (this.amenities.daily_housekipping == "paid") {
        this.ddwnDailyH = "De pago";
      }
      if (this.amenities.daily_housekipping == "flag") {
        this.ddwnDailyH = "Flag";
      }
    }
    (this.swAirConditioned = this.amenities.air_conditioned),
      (this.swNoSmokeRooms = this.amenities.no_smoke_rooms),
      (this.swAirTransferService = this.amenities.air_transfer_service),
      (this.swAirCollectService = this.amenities.air_collect_service),
      (this.swRecection_24h = this.amenities.recection_24h),
      (this.swGym = this.amenities.gym),
      (this.swRoomService = this.amenities.room_service),
      (this.swTerrace = this.amenities.terrace),
      (this.swBar = this.amenities.bar),
      (this.swGarden = this.amenities.garden),
      (this.swRecreationalActivities = this.amenities.recreational_activities),
      (this.swGuardedParking = this.amenities.guarded_parking),
      (this.swStreetParking = this.amenities.street_parking),
      (this.swGarageParking = this.amenities.garage_parking),
      (this.swSpecialParking = this.amenities.special_parking),
      (this.swReg_inout_private = this.amenities.reg_inout_private),
      (this.swReg_inout_express = this.amenities.reg_inout_express),
      (this.swTouristicInfo = this.amenities.touristic_info),
      (this.swParkingService = this.amenities.parking_service),
      (this.swCurrencyChange = this.amenities.currency_change),
      (this.swOutdoorFurniture = this.amenities.outdoor_furniture),
      (this.swTerraceSolarium = this.amenities.terrace_solarium),
      (this.swSharedDinner = this.amenities.shared_dinner),
      (this.swSharedSalon = this.amenities.shared_salon),
      (this.swGameZone = this.amenities.game_zone),
      (this.swLibrary = this.amenities.library),
      (this.swLaundryService = this.amenities.laundry_service),
      (this.swIronService = this.amenities.iron_service),
      (this.swMeetingRoom = this.amenities.meeting_room),
      (this.swMeetingCenter = this.amenities.meeting_center),
      (this.swFaxPhotocopier = this.amenities.fax_photocopier),
      (this.swCoffeeBreak = this.amenities.coffee_break),
      (this.swSouvenirsStore = this.amenities.souvenirs_store),
      (this.swInclusiveService = this.amenities.inclusive_service),
      (this.swElevator = this.amenities.elevator),
      (this.swSmokingZone = this.amenities.smoking_zone),
      (this.swNoSmoking = this.amenities.no_smoking),
      (this.swPetFriendly = this.amenities.pet_friendly),
      (this.swPetHouse = this.amenities.pet_house),
      (this.swPetBasket = this.amenities.PetBasket),
      (this.swOnlyAdults = this.amenities.only_adults),
      (this.swSanitizedRooms = this.amenities.sanitized_rooms),
      (this.swBridalSuite = this.amenities.bridal_suite),
      (this.swVipService = this.amenities.vip_service),
      (this.swCalefaction = this.amenities.calefaction),
      (this.swKeepBags = this.amenities.keep_bags);
    (this.swSecurity24h = this.amenities.security_24h),
      (this.swSecurityAlarm = this.amenities.security_alarm),
      (this.swSmookeDetectors = this.amenities.smoke_detectors),
      (this.swInSecurityCams = this.amenities.in_security_cams),
      (this.swOutSecurityCams = this.amenities.out_security_cams),
      (this.swFireExtinguishers = this.amenities.fire_extinguishers),
      (this.swSafeDepositBox = this.amenities.safe_deposit_box);
  },
  updated() {
    if (this.ddwnSpa == "Gratis") {
      this.amenities.spa = "free";
    }
    if (this.ddwnSpa == "De Pago") {
      this.amenities.spa = "paid";
    }
    if (this.ddwnSpa == "Flag") {
      this.amenities.spa = "flag";
    }

    if (this.ddwnAcuatic == "Gratis") {
      this.amenities.water_park = "free";
    }
    if (this.ddwnAcuatic == "De Pago") {
      this.amenities.water_park = "paid";
    }
    if (this.ddwnAcuatic == "Flag") {
      this.amenities.water_park = "flag";
    }

    if (this.ddwnBeach == "Privada") {
      this.amenities.beach = "private";
    }
    if (this.ddwnBeach == "En frente") {
      this.amenities.beach = "in front";
    }
    if (this.ddwnBeach == "Flag") {
      this.amenities.beach = "flag";
    }

    if (this.ddwnRomanticD == "Gratis") {
      this.amenities.romantic_dinners = "free";
    }
    if (this.ddwnRomanticD == "De Pago") {
      this.amenities.romantic_dinners = "paid";
    }
    if (this.ddwnRomanticD == "Flag") {
      this.amenities.romantic_dinners = "flag";
    }

    if (this.ddwnTouristicT == "Gratis") {
      this.amenities.touristic_tour = "free";
    }
    if (this.ddwnTouristicT == "De Pago") {
      this.amenities.touristic_tour = "paid";
    }
    if (this.ddwnTouristicT == "Flag") {
      this.amenities.touristic_tour = "flag";
    }

    if (this.ddwnDailyH == "Gratis") {
      this.amenities.daily_housekipping = "free";
    }
    if (this.ddwnDailyH == "De Pago") {
      this.amenities.daily_housekipping = "paid";
    }
    if (this.ddwnDailyH == "Flag") {
      this.amenities.daily_housekipping = "flag";
    }
  },
  data() {
    return {
      spaItems: ["Gratis", "De Pago", "Flag"],
      ddwnSpa: null,
      acuaticItems: ["Gratis", "De Pago", "Flag"],
      ddwnAcuatic: null,
      beachItems: ["Privada", "En frente", "Flag"],
      ddwnBeach: null,
      romanticDItems: ["Gratis", "De Pago", "Flag"],
      ddwnRomanticD: null,
      touristicTItems: ["Gratis", "De Pago", "Flag"],
      ddwnTouristicT: null,
      dailyHItems: ["Gratis", "De Pago", "Flag"],
      ddwnDailyH: null,
      swAirConditioned: null,
      swNoSmokeRooms: null,
      swAirTransferService: null,
      swAirCollectService: null,
      swRecection_24h: null,
      swGym: null,
      swRoomService: null,
      swTerrace: null,
      swBar: null,
      swGarden: null,
      swRecreationalActivities: null,
      swGuardedParking: null,
      swStreetParking: null,
      swGarageParking: null,
      swSpecialParking: null,
      swReg_inout_private: null,
      swReg_inout_express: null,
      swTouristicInfo: null,
      swParkingService: null,
      swCurrencyChange: null,
      swOutdoorFurniture: null,
      swTerraceSolarium: null,
      swSharedDinner: null,
      swSharedSalon: null,
      swGameZone: null,
      swLibrary: null,
      swLaundryService: null,
      swIronService: null,
      swMeetingRoom: null,
      swMeetingCenter: null,
      swFaxPhotocopier: null,
      swCoffeeBreak: null,
      swSouvenirsStore: null,
      swInclusiveService: null,
      swElevator: null,
      swSmokingZone: null,
      swNoSmoking: null,
      swPetFriendly: null,
      swPetHouse: null,
      swPetBasket: null,
      swOnlyAdults: null,
      swSanitizedRooms: null,
      swBridalSuite: null,
      swVipService: null,
      swCalefaction: null,
      swKeepBags: null,

      swSecurity24h: null,
      swSecurityAlarm: null,
      swSmookeDetectors: null,
      swInSecurityCams: null,
      swOutSecurityCams: null,
      swFireExtinguishers: null,
      swSafeDepositBox: null,
    };
  },
  computed: {
    ...mapState({
      hotel: (state) => state.HotelModule.hotel,
      amenities: (state) => state.HotelModule.amenities,
    }),
  },
  components: {
    CarrouselRestaurant,
  },
};
</script>

<style scoped>
.iconsInformation {
  margin-bottom: 6px;
}
.flexed {
  display: flex;
}

.v-expansion-panel-header {
  color: white;
}

.v-expansion-panel-content {
  margin-top: 2%;
}
</style>